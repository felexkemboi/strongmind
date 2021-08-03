<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use App\Notifications\Passwords\ResetLinkNotification;
use Postmark\PostmarkClient;
/**
 * Class ResetPasswordController
 * @package App\Http\Controllers
 * @group Auth
 * Reset User Password
 */
class ResetPasswordController extends Controller
{
    /**
     * Password Reset Link
     * @param Request $request
     * @bodyParam email required . User Email
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
            ]
        );
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $email = $request->email;
                $user = User::firstWhere('email', $email);
                if (!$user) {
                    return $this->commonResponse(false, 'Email does not exist!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
                }
                //Create Password Reset Token
                DB::table('password_resets')->insert([
                    'email' => $email,
                    'token' => Str::random(60),
                    'created_at' => now()
                ]);
                //Get the token just created above
                $tokenData = DB::table('password_resets')
                    ->where('email', $email)->first();
                //$user->notify(new ResetLinkNotification($tokenData->token));
                $action_url = config('app.reset_password_url') . "?token=$tokenData->token";
                $mailClient = new PostmarkClient(config('postmark.token'));
                $mailClient->sendEmailWithTemplate(
                    config('mail.from.address'),
                    $email,
                    'password-reset',
                    [
                        'action_url'    => $action_url,
                        'support_email' => config('mail.from.address'),
                        'product_name'  => config('app.name')
                    ]
                );

                return $this->commonResponse(true, 'We have emailed your password reset link!', '', Response::HTTP_CREATED);

            } catch (Exception $exception) {
                Log::critical('Something went wrong sending email to user. ERROR '.$exception->getTraceAsString());
                return $this->commonResponse(false, 'A Network Error occurred. Please try again.', '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    /**
     * Reset Password
     * @param Request $request
     * @bodyParam  token string required . The User Token
     * @bodyParam password password required . The New Password
     * @return JsonResponse
     */
    public function reset(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'token' => 'required',
                'password' => 'required|min:6',
            ]
        );
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        // Validate the token
        $tokenData = DB::table('password_resets')
            ->where('token', $request->token)->first();
        if (is_null($tokenData) || !$tokenData) {
            return $this->commonResponse(false, 'Reset token is invalid', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        //fetch user email
        $token_email  = DB::table('password_resets')->where('token', $tokenData->token)->pluck('email')->first();
        $password = bcrypt($request->password);
        $user = User::firstWhere('email', $token_email); //user based on provided token after fetching matching email
        if (!$user) {
            return $this->commonResponse(false, 'User does not exist!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        if($user->invite_accepted === User::INVITE_NOT_ACCEPTED) {
            return $this->commonResponse(false,'User is yet to accept invite','',Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try{
            //Update the new password
            $user->password = $password;
            $updatePwd = $user->update(); //or $user->save();
            //Delete the token
            $deleteTkn = DB::table('password_resets')->where('email', $user->email)
                ->delete();
            //generate login access token
            $result = [
                'user' => $user,
                'accessToken' => $user->createToken('strong-minds')->plainTextToken,
            ];
            if($updatePwd && $deleteTkn){
                return $this->commonResponse(true, 'Your password has been reset', $result, Response::HTTP_CREATED);
            }
            return $this->commonResponse(false,'Failed to reset password','',Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (QueryException $queryException){
            return $this->commonResponse(false,$queryException->errorInfo[2],'', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Failed to reset user password: ERROR:' .$exception->getTraceAsString());
            return $this->commonResponse(false,$exception->getMessage(),'', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
