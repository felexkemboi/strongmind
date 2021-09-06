<?php


namespace App\Services;


use App\Events\ProgramMemberAdded;
use App\Models\ProgramMemberWaitingList;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramMember;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Postmark\Models\DynamicResponseModel;
use Postmark\Models\PostmarkException;
use Postmark\PostmarkClient;
use Symfony\Component\HttpFoundation\Response;
use Exception;
class ProgramService
{
    use ApiResponser;

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function inviteMembers(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(),
            [
                'email.*' => 'required|email|min:4|max:60',
                'member_type_id' => 'integer|nullable|exists:program_member_types,id'
            ]
        );
        if($validator->fails()){
            return $this->commonResponse(false,Arr::flatten($validator->messages()->get('*')),'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $program = Program::with('office','programType')->find($id);
            if(!$program){
                return $this->commonResponse(false,'Program Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            $inviteEmails = explode(',', $request->email);
            if( count($inviteEmails) > 1 ){
                //invite multiple email address
                foreach ($inviteEmails as $email){
                    $user = User::firstWhere('email', $email);
                    if(!$user){
                        return $this->commonResponse(false,'User with the email address '.$email.' does not exist','', Response::HTTP_NOT_FOUND);
                    }
                    //program member array data
                    $newProgramMember = [
                        'user_id' => $user->id,
                        'program_id' => $program->id,
                        'member_type_id' => $request->member_type_id
                    ];
                    //check against an existing program member
                    $existingMember = ProgramMember::where('user_id',$user->id)->where(function($query) use($program){
                        $query->where('program_id', $program->id);
                    })->exists();
                    if($existingMember){
                        return $this->commonResponse(false,'User exists for this program','', Response::HTTP_UNPROCESSABLE_ENTITY);
                    }
                    if(ProgramMember::create($newProgramMember)){
                        $program->update(['member_count' => $program->member_count + count($inviteEmails)]);
                        $this->notifyMember($user, $program);
                        return $this->commonResponse(true,'Invites sent successfully','', Response::HTTP_OK);
                    }
                    return $this->commonResponse(false,'Failed to send invites, please try again','', Response::HTTP_EXPECTATION_FAILED);
                }
            }
            //send a single invite instead
            $email = $request->email;
            $user = User::firstWhere('email', $email);
            if(!$user){
                return $this->commonResponse(false,'User with the email address '.$email.' does not exist','', Response::HTTP_NOT_FOUND);
            }
            //program member array data
            $newProgramMember = [
                'user_id' => $user->id,
                'program_id' => $program->id,
                'member_type_id' => $request->member_type_id
            ];
            //check against an existing program member
            $existingMember = ProgramMember::where('user_id',$user->id)->where(function($query) use($program){
                $query->where('program_id', $program->id);
            })->exists();
            if($existingMember){
                return $this->commonResponse(false,'User exists for this program','', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            if(ProgramMember::create($newProgramMember)){
                ProgramMemberAdded::dispatch($program); //update member count
                $this->notifyMember($user, $program); //notify user
                return $this->commonResponse(true,'Invite sent successfully','', Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed to send invite, please try again','', Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to send program invite. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
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
        $validator = Validator::make($request->all(),
            [
                'user_id.*' => 'required|integer|exists:users,id',
                'member_type_id' => 'integer|required|exists:program_member_types,id'
            ]);
        if($validator->fails()){
            return $this->commonResponse(false,Arr::flatten($validator->messages()->get('*')),'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $program = Program::with('office','programType')->find($id);
            if(!$program){
                return $this->commonResponse(false,'Program Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            $user = User::firstWhere('id',$request->user_id);
            if(!$user){
                return $this->commonResponse(false,'User Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            $existingMember = ProgramMember::with('programs','memberTypes','users')
                ->where('program_id',$program->id)
                ->where(function($query) use($request){
                    $query->where('user_id', $request->user_id)->where('member_type_id',$request->member_type_id);
            })->first();
            if(!$existingMember){
                return $this->commonResponse(false,'Member does not exist for this program member type','', Response::HTTP_NOT_FOUND);
            }
            if($existingMember->status === ProgramMember::MEMBERSHIP_REVOVED ){
                return $this->commonResponse(false,'Membership already revoked, no action needed','', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            if($existingMember->update(['status' => ProgramMember::MEMBERSHIP_REVOVED])){
                return $this->commonResponse(true,'Membership Revoked Successfully','', Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed to revoke membership','', Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to remove program member. ERROR '. $exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function activateMembership(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make($request->all(),
            [
                'user_id.*' => 'required|integer|exists:users,id',
                'member_type_id' => 'integer|required|exists:program_member_types,id'
            ]);
        if($validator->fails()){
            return $this->commonResponse(false,Arr::flatten($validator->messages()->get('*')),'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $program = Program::with('office','programType')->find($id);
            if(!$program){
                return $this->commonResponse(false,'Program Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            $user = User::firstWhere('id',$request->user_id);
            if(!$user){
                return $this->commonResponse(false,'User Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            $existingMember = ProgramMember::with('programs','memberTypes','users')
                ->where('program_id',$program->id)
                ->where(function($query) use($request){
                    $query->where('user_id', $request->user_id)->where('member_type_id',$request->member_type_id);
                })->first();
            if(!$existingMember){
                return $this->commonResponse(false,'Member does not exist for this program member type','', Response::HTTP_NOT_FOUND);
            }
            if($existingMember->status === ProgramMember::MEMBERSHIP_ACTIVE ){
                return $this->commonResponse(false,'Membership already active, no action needed','', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            if($existingMember->update(['status' => ProgramMember::MEMBERSHIP_ACTIVE])){
                return $this->commonResponse(true,'Membership activated Successfully','', Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed to activate membership','', Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to activate program member. ERROR '. $exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
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
                'action_url' => env('PROGRAM_DETAILS_URL').'/'.$program->id,
                'support_email' => config('mail.from.address'),
                'program_name'  => $program->name ?? '',
                'product_name' => env('APP_NAME')
            ]
        );
    }
}
