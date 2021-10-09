<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
     * Login User
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  email string required  Email Address.
     * @bodyParam  password string required Password.
     *
     */

    public function loginUser(LoginRequest $request): JsonResponse
    {

        $user = User::where('email',$request->email)->firstOrFail();

        if ($user->invite_accepted !== 1 && $user->active !== 1 ){
            return $this->commonResponse(false, 'The user is not active!', '', Response::HTTP_EXPECTATION_FAILED);
        }

        if ( !Hash::check($request->password, $user->password) ) {
            return $this->commonResponse(false, 'The password/email is incorrect!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->update(['last_login' => now()]);
        $result = [
            'user' => new UserResource($user),
            'accessToken' => $user->createToken('strong-minds')->plainTextToken,
        ];

        return $this->commonResponse(true, 'success', $result, Response::HTTP_OK);
    }
    /**
     * User profile
     * @return JsonResponse
     * @authenticated
     */
    public function profile(): JsonResponse
    {
        $user = Auth::user();
        return $this->commonResponse(true, 'success', new UserResource($user), Response::HTTP_OK);
    }

    /**
     * Logout User
     * @group Auth
     * @param Request $request
     * @return JsonResponse
     * @authenticated
     */
    public function logout(Request $request): JsonResponse
    {
        try {
            if ($request->user()->tokens()->delete()) {
                return $this->commonResponse(true, 'Logout Successful', '', Response::HTTP_OK);
            }
            return $this->commonResponse(true, 'Failed to logout', '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $exception) {
            Log::critical('Something went wrong performing the logout action. ERROR ' . $exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
