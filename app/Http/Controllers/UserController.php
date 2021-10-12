<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Office;
use App\Models\Timezone;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Silber\Bouncer\Database\Role;
use Symfony\Component\HttpFoundation\Response;
use function Clue\StreamFilter\fun;

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
     * @queryParam name string Search by name. No-example
     * @queryParam role integer Filter by role. 1
     * @queryParam paginate boolean required . Specify whether true or false
     * @param Request $request
     * @queryParam sort string Filter either by desc or asc order
     * @return JsonResponse
     * @authenticated
     */
    public function index(Request $request): JsonResponse
    {
        $users = User::query();
        $name=$request->get('name');
        $role=$request->get('role');
        $paginate=$request->get('paginate');
        $sort = $request->get('sort');
        $sort_params = ['desc','asc'];
        $invited = $request->get('accepted');
        if ($request->has('name') && $request->filled('name')) {
            $users = $users->where('name', 'ilike', '%'.$name.'%');
            if($request->has('accepted') && $request->filled('accepted')){
                if($invited === "true"){
                    $users = $users->where('invite_accepted',User::INVITE_ACCEPTED);
                }else if($invited === "false"){
                    $users = $users->where('invite_accepted', User::INVITE_NOT_ACCEPTED);
                }else{
                    return $this->commonResponse(false,'Invalid search parameter on invites','', Response::HTTP_UNPROCESSABLE_ENTITY);
                }
            }
        }
        if ($request->has('role') && $request->filled('role')) {
            $users = $users->whereIn('id', $this->getUserIds($role));
        }
        if($request->has('sort') &&  $request->filled('sort')){
           if(!$this->sort_array($sort, $sort_params)){
                return $this->commonResponse(false,'Invalid Sort Parameter','',Response::HTTP_UNPROCESSABLE_ENTITY);
           }
            $users = $users->orderBy('id',$sort);
        }

        if ($request->get('paginate') && $request->filled('paginate')) {
            if($paginate){
                $users=$users->where('is_admin', '<>', 1)->paginate(10);
            }
            $users=$users->where('is_admin', '<>', 1);
        }

        return $this->commonResponse(true, 'success', UserResource::collection($users)->response()->getData(true), Response::HTTP_OK);
    }
    /**
     * Get all user IDs in with a given role
     */
    private function getUserIds($roleId)
    {
        return DB::table('assigned_roles')
                ->join('roles', 'roles.id', 'assigned_roles.role_id')
                ->select('assigned_roles.entity_id as user_id')
                ->where('assigned_roles.role_id', $roleId)
                ->get()
                ->pluck('user_id')
            ?? [];
    }

    /**
     * Get User by Id
     * @group Teams
     * @param int $id
     * @urlParam id integer required The ID of the user.Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function showUser(int $id): JsonResponse
    {
        $user = User::find($id);
        if ($user) {
            return $this->commonResponse(true, 'success', new UserResource($user), Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'User not found!', '', Response::HTTP_NOT_FOUND);
        }
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
     * Update user profile.
     * @group Auth
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  name string Name
     * @bodyParam  email string required Email Address
     * @bodyParam  phone_number string Phone Number
     * @bodyParam  timezone_id integer Timezone ID.Example:2
     * @bodyParam  gender string  Gender. Example:male
     * @bodyParam  region string  Region.Example:East Africa
     * @bodyParam  city string  City.Example:Nairobi
     * @bodyParam  languages string[] Languages.Example ["English","French"]
     * @authenticated
     */
    public function updateProfile(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable',
            'email' => 'required',
            'phone_number' => 'nullable',
            'gender' => 'nullable',
            'region' => 'nullable',
            'city' => 'nullable',
            'languages' => 'nullable|array',
            'timezone_id' => 'nullable',
        ]);
        try {
            if ($validator->fails()) {
                return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $data = $validator->validated();
            if ($request->has('timezone_id') && $request->filled('timezone_id')) {
                $timezone = Timezone::find($request->timezone_id);
                if (!$timezone) {
                    return $this->commonResponse(false, 'Timezone not found!', '', Response::HTTP_NOT_FOUND);
                }
            }


            auth()->user()->update($data);
            $user = auth()->user()->fresh();
            return $this->commonResponse(true, 'Profile updated successfully!', new UserResource($user), Response::HTTP_CREATED);
        } catch (QueryException $ex) {
            return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $ex) {
            return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
    /**
     * Update member details.
     * @group Teams
     * @param Request $request
     * @param int $id
     * @urlParam id integer required The User ID. Example:1
     * @return JsonResponse
     * @bodyParam  name string Name
     * @bodyParam  email string required Email Address
     * @bodyParam  phone_number string Phone Number
     * @bodyParam  office_id integer Office ID.Example:1
     * @bodyParam  role_id integer  Role ID.Example:1
     * @bodyParam  timezone_id integer Timezone ID.Example:2
     * @bodyParam  gender string  Gender. Example:male
     * @bodyParam  region string  Region.Example:East Africa
     * @bodyParam  city string  City.Example:Nairobi
     * @bodyParam  languages string[] Languages.Example ["English","French"]
     * @authenticated
     */
    public function updateUser(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable',
            'email' => 'required',
            'office_id' => 'nullable',
            'phone_number' => 'nullable',
            'gender' => 'nullable',
            'region' => 'nullable',
            'city' => 'nullable',
            'languages' => 'nullable|array',
            'timezone_id' => 'nullable',
            'role_id' => 'nullable',
        ]);
        try {
            if ($validator->fails()) {
                return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $data = $validator->validated();
            //Get user
             $user=User::find($id);
            if (!$user) {
                return $this->commonResponse(false, 'User not found!', '', Response::HTTP_NOT_FOUND);
            }
            if ($request->has('timezone_id') && $request->filled('timezone_id')) {
                $timezone = Timezone::find($request->timezone_id);
                if (!$timezone) {
                    return $this->commonResponse(false, 'Timezone not found!', '', Response::HTTP_NOT_FOUND);
                }
            }
            if ($request->has('office_id') && $request->filled('office_id')) {
                $office = Office::find($request->office_id);
                if (!$office) {
                    return $this->commonResponse(false, 'Office not found!', '', Response::HTTP_NOT_FOUND);
                }
            }

            $user->update($data);
            $user->fresh();
            if ($request->has('role_id') && $request->filled('role_id')) {
                $role = Role::firstwhere('id', $data['role_id']);

                if ($role) {
                    //delete existing role
                    DB::table('assigned_roles')->where('entity_id', $user->id)
                ->delete();
                    $user->assign($role->name);
                }
            }


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
            $request->all(),
            [
            'profile_pic' => 'required|image',
        ]
        );
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

    /**
     * Delete User
     * @group Teams
     * @param int $id
     * @urlParam id integer required The ID of the user.Example:1
     * @return JsonResponse
     * @authenticated
     */
    public function delete(int $id ): JsonResponse
    {
        $user = User::find($id);
        if(!$user){
            return $this->commonResponse(false,'User Not Found', '', Response::HTTP_NOT_FOUND);
        }
        try{
            if(!$user->delete()){
                return $this->commonResponse(false,'Failed To Delete User','',Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            return $this->commonResponse(true,'User Deleted Successfully','', Response::HTTP_OK);
        }catch (QueryException $exception){
            return $this->commonResponse(false, $exception->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }catch (Exception $exception){
            Log::critical('Could not delete user. ERROR: '.$exception->getTraceAsString());
            return $this->commonResponse(false, $exception->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * case in-sensitive in_array for the sort parameters(desc, asc)
     * @param $needle
     * @param $haystack
     * @return bool
     */
    private function sort_array($needle, $haystack){
        return in_array(strtolower($needle), array_map('strtolower', $haystack), true);
    }
}
