<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LoginController
 * @package App\Http\Controllers
 * @group Auth
 * Authenticate User
 */
class LoginController extends Controller
{
    /**
     * Authenticate user
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  email string required  Email Address.
     * @bodyParam  password string required Password.
     *
     */
    public function loginUser(Request $request): JsonResponse
    {
        $validatedLogin = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );
        if ($validatedLogin->fails()) {
            return $this->commonResponse(false, Arr::flatten($validatedLogin->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $password = $request->password;
            $email=$request->email;
            $user=User::firstWhere('email',$email);
            if (!$user) {
                return $this->commonResponse(false, 'The provided credentials are incorrect!', '', Response::HTTP_EXPECTATION_FAILED);
            }
            elseif ($user->invite_accepted !=1 && $user->active!=1) {
                return $this->commonResponse(false, 'The provided credentials are incorrect or account is inactive.', '', Response::HTTP_EXPECTATION_FAILED);
            }elseif (!Hash::check($password, $user->password)) {
                return $this->commonResponse(false, 'The provided credentials are incorrect.', '', Response::HTTP_EXPECTATION_FAILED);
            } else {
                $user->update(['last_login' => now()]);
                $result = [
                    'user' => new UserResource($user),
                    'accessToken' => $user->createToken('strongminds')->plainTextToken,
                ];
                return $this->commonResponse(true, 'success', $result, Response::HTTP_CREATED);
            }
        }
    }
    /**
     * Authenticated user profile
     * @return JsonResponse
     * @authenticated
     */
    public function profile(): JsonResponse
    {
        $user = Auth::user();
        return $this->commonResponse(true, 'success', new UserResource($user), Response::HTTP_OK);
    }

}
