<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Office;
use App\Models\Timezone;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Silber\Bouncer\Database\Role;
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
     * @bodyParam  office_id integer required Office ID.Example:1
     * @bodyParam  role_id integer required Role ID.Example:1
     * @bodyParam  timezone_id integer Timezone ID.Example:2
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
            'email' => 'required',
            'office_id' => 'required',
            'phone_number' => 'nullable',
            'gender' => 'nullable',
            'region' => 'required',
            'city' => 'nullable',
            'languages' => 'nullable',
            'timezone_id' => 'nullable',
            'role_id' => 'required',
        ]);
        try {
            if ($validator->fails()) {
                return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $data = $validator->validated();
            $office = Office::find($data['office_id']);
            $timezone = Timezone::find($data['timezone_id']);
            $role = Role::firstwhere('id', $data['role_id']);
            if (!$office) {
                return $this->commonResponse(false, 'Office not found!', '', Response::HTTP_NOT_FOUND);
            }
            if (!$timezone) {
                return $this->commonResponse(false, 'Timezone not found!', '', Response::HTTP_NOT_FOUND);
            }
            if (!$role) {
                return $this->commonResponse(false, 'Role not found!', '', Response::HTTP_NOT_FOUND);
            }
            auth()->user()->update($data);
            $user = auth()->user()->fresh();
            //delete existing role
            DB::table('assigned_roles')->where('entity_id', $user->id)
                ->delete();
            $user->assign($role->name);
            return $this->commonResponse(true, 'Profile updated successfully!', new UserResource($user), Response::HTTP_CREATED);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Set profile photo.
     * @group Auth
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  profile_pic file required Profile photo
     * @authenticated
     */
    public function setPhoto(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(), [
            'profile_pic' => 'required|image',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                if ($request->hasFile('profile_pic')) {
                    $documentPath = $request->file('profile_pic')->store('users', 's3');
                } else {
                    return $this->commonResponse(false, 'No file uploaded', '', Response::HTTP_BAD_REQUEST);
                }
                $user = Auth::user();
                $user->profile_pic_url = Storage::disk('s3')->url($documentPath);
                $user->profile_pic = basename($documentPath);
                $user->save();

                return $this->commonResponse(true, 'Profile photo set!', new UserResource($user), Response::HTTP_CREATED);
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }

    }
}
