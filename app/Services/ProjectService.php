<?php


namespace App\Services;


use App\Events\ProgramMemberAdded;
use App\Models\Programs\Project;
use App\Models\Programs\ProgramMember;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Postmark\Models\DynamicResponseModel;
use Postmark\PostmarkClient;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class ProjectService
{
    use ApiResponser;

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function inviteMembers(Request $request, $id): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email.*' => 'required|email|min:4|max:60',
                'member_type_id' => 'integer|nullable|exists:program_member_types,id'
            ]
        );
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $project = Project::with('office', 'programType')->find($id);
            if (!$project) {
                return $this->commonResponse(false, 'Project Does Not Exist', '', Response::HTTP_NOT_FOUND);
            }
            $inviteEmails = explode(',', $request->email);
            if (count($inviteEmails) > 1) {
                //invite multiple email address
                foreach ($inviteEmails as $email) {
                    $user = User::firstWhere('email', $email);
                    if (!$user) {
                        return $this->commonResponse(false, 'User with the email address ' . $email . ' does not exist', '', Response::HTTP_NOT_FOUND);
                    }
                    //program member array data
                    $newProgramMember = [
                        'user_id' => $user->id,
                        'program_id' => $project->id,
                        'member_type_id' => $request->member_type_id
                    ];
                    //check against an existing active program member
                    $existingMember = ProgramMember::where('user_id', $user->id)->where(function ($query) use ($project) {
                        $query->where('program_id', $project->id);
                    })->first();
                    if ($existingMember->status === ProgramMember::MEMBERSHIP_ACTIVE) {
                        return $this->commonResponse(false, 'User actively exists for this project', '', Response::HTTP_UNPROCESSABLE_ENTITY);
                    }
                    if ($existingMember->status === ProgramMember::MEMBERSHIP_REVOVED) {
                        $existingMember->update(['status' => ProgramMember::MEMBERSHIP_ACTIVE]);
                        $project->update(['member_count' => $project->member_count + count($inviteEmails)]);
                        return $this->commonResponse(true, 'Project member added successfully', '', Response::HTTP_OK);
                    }
                    if (ProgramMember::create($newProgramMember)) {
                        $project->update(['member_count' => $project->member_count + count($inviteEmails)]);
                        $this->notifyMember($user, $project);
                        return $this->commonResponse(true, 'Invites sent successfully', '', Response::HTTP_OK);
                    }
                    return $this->commonResponse(false, 'Failed to send invites, please try again', '', Response::HTTP_EXPECTATION_FAILED);
                }
            }
            //send a single invite instead
            $email = $request->email;
            $user = User::firstWhere('email', $email);
            if (!$user) {
                return $this->commonResponse(false, 'User with the email address ' . $email . ' does not exist', '', Response::HTTP_NOT_FOUND);
            }
            //program member array data
            $newProgramMember = [
                'user_id' => $user->id,
                'program_id' => $project->id,
                'member_type_id' => $request->member_type_id
            ];
            //check against an existing active program member
            $existingMember = ProgramMember::where('user_id', $user->id)->where(function ($query) use ($project) {
                $query->where('program_id', $project->id);
            })->first();
            if ($existingMember->status === ProgramMember::MEMBERSHIP_ACTIVE) {
                return $this->commonResponse(false, 'User exists for this project', '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }if($existingMember->status === ProgramMember::MEMBERSHIP_REVOVED){
                $existingMember->update(['status' => ProgramMember::MEMBERSHIP_ACTIVE]);
                $project->update(['member_count' => $project->member_count + 1]);
                return $this->commonResponse(true, 'Project member added successfully', '', Response::HTTP_OK);
            }
            if (ProgramMember::create($newProgramMember)) {
                ProgramMemberAdded::dispatch($project); //update member count
                $this->notifyMember($user, $project); //notify user
                return $this->commonResponse(true, 'Invite sent successfully', '', Response::HTTP_OK);
            }
            return $this->commonResponse(false, 'Failed to send invite, please try again', '', Response::HTTP_EXPECTATION_FAILED);
        } catch (QueryException $queryException) {
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $exception) {
            Log::critical('Failed to send program invite. ERROR: ' . $exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @urlParam id integer required the program Id.
     * @bodyParam user_id integer required User ID
     * @bodyParam member_type_id integer required The Member Type Id
     * @return JsonResponse
     */
    public function revokeMembership(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id.*' => 'required|integer|exists:users,id',
                'member_type_id' => 'integer|required|exists:program_member_types,id'
            ]
        );
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $project = Project::with('office', 'programType')->find($id);
            if (!$project) {
                return $this->commonResponse(false, 'Project Does Not Exist', '', Response::HTTP_NOT_FOUND);
            }
            $user = User::firstWhere('id', $request->user_id);
            if (!$user) {
                return $this->commonResponse(false, 'User Does Not Exist', '', Response::HTTP_NOT_FOUND);
            }
            $existingMember = ProgramMember::with('programs', 'memberTypes', 'users')
                ->where('program_id', $project->id)
                ->where(function ($query) use ($request) {
                    $query->where('user_id', $request->user_id)->where('member_type_id', $request->member_type_id);
                })->first();
            if (!$existingMember) {
                return $this->commonResponse(false, 'Member does not exist for this project member type', '', Response::HTTP_NOT_FOUND);
            }
            if ($existingMember->status === ProgramMember::MEMBERSHIP_REVOVED) {
                return $this->commonResponse(false, 'Membership already revoked, no action needed', '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            if ($existingMember->update(['status' => ProgramMember::MEMBERSHIP_REVOVED])) {
                $project->update(['member_count' => $project->member_count - 1]);
                return $this->commonResponse(true, 'Membership Revoked Successfully', '', Response::HTTP_OK);
            }
            return $this->commonResponse(false, 'Failed to revoke membership', '', Response::HTTP_EXPECTATION_FAILED);
        } catch (QueryException $queryException) {
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $exception) {
            Log::critical('Failed to remove project member. ERROR ' . $exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function activateMembership(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id.*' => 'required|integer|exists:users,id',
                'member_type_id' => 'integer|required|exists:program_member_types,id'
            ]
        );
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $project = Project::with('office', 'programType')->find($id);
            if (!$project) {
                return $this->commonResponse(false, 'Project Does Not Exist', '', Response::HTTP_NOT_FOUND);
            }
            $user = User::firstWhere('id', $request->user_id);
            if (!$user) {
                return $this->commonResponse(false, 'User Does Not Exist', '', Response::HTTP_NOT_FOUND);
            }
            $existingMember = ProgramMember::with('programs', 'memberTypes', 'users')
                ->where('program_id', $project->id)
                ->where(function ($query) use ($request) {
                    $query->where('user_id', $request->user_id)->where('member_type_id', $request->member_type_id);
                })->first();
            if (!$existingMember) {
                return $this->commonResponse(false, 'Member does not exist for this program member type', '', Response::HTTP_NOT_FOUND);
            }
            if ($existingMember->status === ProgramMember::MEMBERSHIP_ACTIVE) {
                return $this->commonResponse(false, 'Membership already active, no action needed', '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            if ($existingMember->update(['status' => ProgramMember::MEMBERSHIP_ACTIVE])) {
                return $this->commonResponse(true, 'Membership activated Successfully', '', Response::HTTP_OK);
            }
            return $this->commonResponse(false, 'Failed to activate membership', '', Response::HTTP_EXPECTATION_FAILED);
        } catch (QueryException $queryException) {
            return $this->commonResponse(false, $queryException->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $exception) {
            Log::critical('Failed to activate program member. ERROR ' . $exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param $user
     * @param $program
     * @return DynamicResponseModel
     */
    public function notifyMember($user, $program): DynamicResponseModel
    {
        //notify member that they have been added to this program
        $client = new PostmarkClient(config('postmark.token'));
        return $client->sendEmailWithTemplate(
            config('mail.from.address'),
            $user->email,
            'program-invitation',
            [
                'action_url' => env('PROGRAM_DETAILS_URL') . '/' . $program->id,
                'support_email' => config('mail.from.address'),
                'program_name'  => $program->name ?? '',
                'product_name' => env('APP_NAME')
            ]
        );
    }
}
