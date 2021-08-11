<?php


namespace App\Services;


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
                    $invite_token = hash('sha256', utf8_encode(Str::uuid()));
                    $action_url = '';
                    $invitedUsers  = [
                        'invite_id' => $invite_token,
                        'email' => $email,
                        'program_id' => $program->id,
                        'member_type_id' => $request->member_type_id ?? 1
                    ];
                    $mail = $this->sendMailInvite($email, $action_url, $program);
                    if($mail){
                        ProgramMemberWaitingList::create($invitedUsers); //create program member waiting list
                        return $this->commonResponse(true,'Invites sent successfully','', Response::HTTP_OK);
                    }
                    return $this->commonResponse(false,'Failed to send invites, please try again','', Response::HTTP_EXPECTATION_FAILED);
                }
            }
            //send a single invite
            $email = $request->email;
            $invite_token = hash('sha256', utf8_encode(Str::uuid()));
            $action_url = '';
            $invitedUser  = [
                'invite_id' => $invite_token,
                'email' => $email,
                'program_id' => $program->id,
                'member_type_id' => $request->member_type_id ?? 1
            ];
            $mail = $this->sendMailInvite($email, $action_url, $program);
            if($mail){
                $existingInvite = ProgramMemberWaitingList::firstWhere('email',$request->email);
                if($existingInvite){
                    $existingInvite->update(['invite_id' => $invite_token]);
                }else{
                    ProgramMemberWaitingList::create($invitedUser); //create program member waiting list
                }
                return $this->commonResponse(true,'Invite sent successfully','', Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed to send invite, please try again','', Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to send program invite. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false,'Failed to send program invite','', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function processInvite(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),['invite_id' => 'required']);
        if($validator->fails()){
            return $this->commonResponse(false,Arr::flatten($validator->messages()->get('*')),'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $inWaitingList = ProgramMemberWaitingList::firstWhere('invite_id',$request->invite_id);
            if(!$inWaitingList){
                return $this->commonResponse(false,'Invalid invite ID','', Response::HTTP_NOT_FOUND);
            }
            $user = User::firstWhere('email',$inWaitingList->email);
            if(!$user){
                return $this->commonResponse(false,'User Does Not Exist','', Response::HTTP_NOT_FOUND);
            }
            $existingMember = ProgramMember::with('programs','memberTypes','users')->where('user_id',$user->id)
                    ->where('member_type_id',$inWaitingList->member_type_id)->where('program_id',$inWaitingList->program_id)->exists();
            if($existingMember){
                return $this->commonResponse(false,'Program member exists','', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $newProgramMember = [
                'user_id' => $user->id,
                'program_id' => $inWaitingList->program_id,
                'member_type_id' => $inWaitingList->member_type_id
            ];
            if(ProgramMember::create($newProgramMember)){
                $inWaitingList->delete(); //remove member from waiting list creation
                return $this->commonResponse(true,'Member added successfully to the program','', Response::HTTP_OK);
            }
            return $this->commonResponse(false,'Failed to add member','', Response::HTTP_EXPECTATION_FAILED);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to add invited user to the program');
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @urlParam id integer required the program Id.
     * @bodyParam user_id integer required User ID
     * @bodyParam member_type_id integer required The Member Type Id
     * @return JsonResponse
     */
    public function revokeMembership(Request $request, $id): JsonResponse
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
                ->firstWhere('program_id',$program->id)
                ->where(function($query) use($request){
                    $query->where('user_id', $request->user_id)->where('member_type_id',$request->member_type_id);
            });
            if(!$existingMember){
                return $this->commonResponse(false,'Member does not exist for this program member type','', Response::HTTP_NOT_FOUND);
            }
            //TODO set membership status as revoked instead of deleting record
            if($existingMember->delete()){
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
     * @param $email
     * @param $action_url
     * @param $program
     * @return JsonResponse
     */
    private function sendMailInvite($email, $action_url, $program): JsonResponse
    {
        try{
            $client = new PostmarkClient(config('postmark.token'));
            $client->sendEmailWithTemplate(
                config('mail.from.address'),
                $email,
                'program-invitation',
                [
                    'action_url' => $action_url,
                    'support_email' => config('mail.from.address'),
                    'program_name'  => $program->name ?? '',
                    'product_name' => env('APP_NAME')
                ]
            );
            return $this->commonResponse(true,'Invite Sent Successfully','', Response::HTTP_CREATED);
        }catch (Exception $exception){
            return $this->commonResponse(false,$exception->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
