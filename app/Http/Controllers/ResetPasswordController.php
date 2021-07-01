<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ResetPasswordController extends Controller
{
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
                Notification::route('mail', $user->email)
                    ->notify(new ResetLinkNotification($user, $tokenData->token));
                return $this->commonResponse(true, 'We have emailed your password reset link!', '', Response::HTTP_CREATED);

            } catch (Exception $exception) {
                return $this->commonResponse(false, 'A Network Error occurred. Please try again.', '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

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
            }
            // Validate the token
            $tokenData = DB::table('password_resets')
                ->where('token', $request->token)->first();
            if (is_null($tokenData) || !$tokenData) {
                return $this->commonResponse(false, 'Reset token is invalid', '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
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
