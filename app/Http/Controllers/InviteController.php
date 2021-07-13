<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Office;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Postmark\PostmarkClient;
use Silber\Bouncer\Database\Role;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class InviteController
 * @package App\Http\Controllers
 * @group Teams
 * Invite Member
 */
class InviteController extends Controller
{
    /**
     * Invite member
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  email string required  Email Address.
     * @bodyParam  role_id integer required Role Id.
     * @bodyParam  office_id integer required Office Id.
     * @authenticated
     *
     */
    public function invite(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email.*' => 'required|email|unique:users',
            'role_id' => 'required',
            'office_id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $email = explode(',',$request->email);
            $invite_token = hash('sha256', utf8_encode(Str::uuid()));
            $role = Role::find($request->role_id);
            //if multiple emails are submitted
            if(count($email) > 1)
            {
                $this->sendMultipleInvites($request);
            }else{
                //Create user for a single email invite
                $email = $request->email;
                $user = User::create(
                    [
                        'email' => $email,
                        'office_id' => $request->office_id,
                        'is_admin' => 0,
                        'invite_accepted' => 0,
                        'invite_id' => $invite_token,
                        'password' => bcrypt(Str::random(8)),
                        'active' => 0,
                    ]
                );
                if ($role) {
                    $user->assign($role->name);
                }
                $action_url = config('app.set_password_url') . "?invite=$invite_token";
                $client = new PostmarkClient(config('postmark.token'));
                $client->sendEmailWithTemplate(
                    config('mail.from.address'),
                   $email,
                    'user-invitation',
                    [
                        'action_url' => $action_url,
                        'support_email' => config('mail.from.address')
                    ]
                );

            }
            return $this->commonResponse(true, 'invite sent successfully!', '', Response::HTTP_CREATED);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Set Password
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  password string required  Password.
     * @bodyParam  invite string required Invite Id.
     *
     */
    public function setPassword(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'invite' => 'required',

        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $user = User::firstWhere('invite_id', $request->invite);
                if (!$user) {
                    return $this->commonResponse(false, 'Invite ID invalid!', '', Response::HTTP_NOT_FOUND);
                } else {
                    $user->update([
                        'password' => bcrypt($request->password),
                        'invite_accepted' => 1,
                        'active' => 1,
                        'invite_id' => '',
                    ]);
                    $user->fresh();
                    $office=Office::firstWhere('id',$user->office_id);
                    $new_count=($office->member_count)+1;
                    $office->update(['member_count' => $new_count]);
                    $result = [
                        'user' => new UserResource($user),
                        'accessToken' => $user->createToken('strongminds')->plainTextToken,
                    ];
                    return $this->commonResponse(true, 'Password set successfully!', $result, Response::HTTP_CREATED);
                }
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }

    }

    /**
     * Send multiple invites
     * @param Request $request
     */
    private function sendMultipleInvites(Request $request): void
    {
        $email = explode(',',$request->email);
        $role = Role::find($request->role_id);
        $client = new PostmarkClient(config('postmark.token'));
        foreach($email as $member)
        {
            $invite_token = hash('sha256', utf8_encode(Str::uuid()));
            $action_url = config('app.set_password_url') . "?invite=$invite_token";

            $user = User::create([
                'email' => $member,
                'office_id' => $request->office_id,
                'is_admin'  => 0,
                'invite_accepted' => 0,
                'invite_id' => $invite_token,
                'password' => bcrypt(Str::random(8)),
                'active' => 0
            ]);
            if ($role) {
                $user->assign($role->name);
            }
            $client->sendEmailWithTemplate(
                config('mail.from.address'),
                $member,
                'user-invitation',
                [
                    'action_url' => $action_url,
                    'support_email' => config('mail.from.address')
                ]
            );
        }
    }
}
