<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 * @package App\Http\Controllers
 * User management
 */
class UserController extends Controller
{
    /**
     * All Users
     * @group Teams
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        $users = User::query()->where('is_admin', '<>', 1)->paginate(10);
        return $this->commonResponse(true, 'success', UserResource::collection($users), Response::HTTP_OK);
    }
    /**
     * Change a user's password.
     * @group Auth
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  current_password string required Current Password
     * @bodyParam  new_password string required New Password
     * @authenticated
     */
    public function changePassword(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'current_password' => 'required',
                'new_password' => 'required|min:6',
            ]
        );
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
                return $this->commonResponse(false, 'Your current password does not match with the password you provided. Please try again.!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
                return $this->commonResponse(false, 'New Password cannot be same as your current password. Please choose a different password!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            return $this->commonResponse(true, 'Password has been changed', '', Response::HTTP_CREATED);
        }
    }
    /**
     * Change a user's profile.
     * @group Auth
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  name string required Name
     * @bodyParam  email string required Email Address
     * @bodyParam  phone_number string Phone Number
     * @bodyParam  office_id integer Office ID.Example:1
     * @bodyParam  timezone_id integer  Timezone ID.Example:2
     * @bodyParam  gender string  Gender. Example:male
     * @bodyParam  region string  Region.Example:East Africa
     * @bodyParam  city string  City.Example:Nairobi
     * @bodyParam  languages string  Languages.Example:English
     * @authenticated
     */
    public function updateProfile(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'nullable',
            'office_id' => 'required',
            'phone_number' => 'nullable',
            'gender' => 'nullable',
            'region' => 'required',
            'city' => 'nullable',
            'languages' => 'nullable',
            'timezone_id' => 'nullable',
        ]);
        try {
            if ($validator->fails()) {
                return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $data = $validator->validated();
            auth()->user()->update($data);
            $user = auth()->user()->fresh();
            return $this->commonResponse(true, 'Profile updated successfully!', new UserResource($user), Response::HTTP_CREATED);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

}
