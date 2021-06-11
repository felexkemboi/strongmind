<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RoleController
 * @package App\Http\Controllers
 * @group Auth
 * APIs for roles and permissions
 */
class RoleController extends Controller
{
    /**
     * All Roles
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $roles = Role::latest()->get();
        return $this->commonResponse(true, 'success', RoleResource::collection($roles), Response::HTTP_OK);

    }

    /**
     * Create Role
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  slug string required Role Name. Example admin
     * @bodyParam  title string required Title. Example Administrator
     */
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $role = Role::firstOrCreate([
                    'name' => $request->slug,
                    'title' => $request->title,
                ]);
                return $this->commonResponse(true, 'Role created successfully!', new RoleResource($role), Response::HTTP_CREATED);
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }
    // end role
    /**
     * Assign Permissions to role
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  role_id integer required Role ID. Example 1
     * @bodyParam  permissions integer[] required Permission IDs. Example [1,2]
     */
    public function assignPermissionToRole(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'permissions' => 'required|array',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
            $role=Role::firstWhere('id',$request->role_id);
            $permissions=$request->permissions;
            if($role){
                foreach ($permissions as $val){
                    $perm=Ability::find($val);
                    if($perm){
                        \Bouncer::allow($role)->to($perm);
                    }

                }
                return $this->commonResponse(true, 'Permission(s) assign to role successfully!', '', Response::HTTP_CREATED);
            }
            else{
                return $this->commonResponse(false, 'Role not found!', '', Response::HTTP_NOT_FOUND);
            }
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }
}
