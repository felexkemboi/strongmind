<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
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
                    return $this->commonResponse(false, 'User not found!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
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
     * @bodyParam email string required . The User Email
     * @bodyParam password password required . The New Password
     * @return JsonResponse
     */
    public function reset(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'token' => 'required',
                'password' => 'required|min:6',
            ]
        );
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $email = $request->email;
            $password = bcrypt($request->password);
            $user = User::firstWhere('email', $email);
            if (!$user) {
                return $this->commonResponse(false, 'User not found!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }else if($user->invite_accepted === User::INVITE_NOT_ACCEPTED) {
                return $this->commonResponse(false,'User is yet to accept invite','',Response::HTTP_UNPROCESSABLE_ENTITY);
            }else{
                // Validate the token
                $tokenData = DB::table('password_resets')
                    ->where('token', $request->token)->first();
                if (is_null($tokenData) || !$tokenData) {
                    return $this->commonResponse(false, 'Reset token is invalid', '', Response::HTTP_UNPROCESSABLE_ENTITY);
                }else{
                    //Update the new password
                    $user->password = $password;
                    $user->update(); //or $user->save();
                    //Delete the token
                    DB::table('password_resets')->where('email', $user->email)
                        ->delete();
                    //generate login access token
                    $result = [
                        'user' => $user,
                        'accessToken' => $user->createToken('strong-minds')->plainTextToken,
                    ];
                    return $this->commonResponse(true, 'Your password has been reset', $result, Response::HTTP_CREATED);
                }
            }
        }
    }
}
