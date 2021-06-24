<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Http\Resources\RoleResource;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\Role;
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
     * @bodyParam  name string required Role Name. Example admin
     * @bodyParam  role_code string required Code. Example Administrator
     * @bodyParam  description string  Description. Example This is Administrator
     * @bodyParam  access_permissions integer[] required Permission IDs. Example [1,2]
     */
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role_code' => 'required',
            'description' => 'nullable',
            'access_permissions' => 'required|array',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $slug = Str::slug($request->name);
                $role_exists = Role::firstWhere('name', $slug);
                $code_exists = Role::firstWhere('code', $request->role_code);
                if ($role_exists) {
                    return $this->commonResponse(false, 'Role already exists!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
                }
                if ($code_exists) {
                    return $this->commonResponse(false, 'Role Code already exists!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
                } else {
                    $role = new Role;
                    $role->name = $slug;
                    $role->title = $request->name;
                    $role->code = $request->role_code;
                    $role->description = $request->description;
                    $role->save();
                    $permissions = $request->access_permissions;
                    foreach ($permissions as $val) {
                        $perm = Ability::find($val);
                        if ($perm) {
                            \Bouncer::allow($role)->to($perm);
                        }
                    }
                    return $this->commonResponse(true, 'Role created successfully!', new RoleResource($role), Response::HTTP_CREATED);
                }
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    /**
     * Get Role by Id
     * @param int $id
     * @return JsonResponse
     */
    public function showRole(int $id): JsonResponse
    {
        $role = Role::find($id);
        if ($role) {
            return $this->commonResponse(true, 'success', new RoleResource($role), Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Role not found!', '', Response::HTTP_NOT_FOUND);
        }

    }

    /**
     * Update Role
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @bodyParam  name string required Role Name. Example admin
     * @bodyParam  role_code string required Code. Example Administrator
     * @bodyParam  description string  Description. Example This is Administrator
     * @bodyParam  access_permissions integer[] required Permission IDs. Example [1,2]
     */
    public function updateRole(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role_code' => 'required',
            'description' => 'nullable',
            'access_permissions' => 'required|array',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $role = Role::find($id);
                $slug = Str::slug($request->name);
                if ($role) {
                    $role->name = $slug;
                    $role->title = $request->name;
                    $role->code = $request->role_code;
                    $role->description = $request->description;
                    $role->save();
                    $permissions = $request->access_permissions;
                    $existing_permissions = AuthHelper::RawRolePermissions($id);
                    //detach all permissions from role
                    foreach ($existing_permissions as $key) {
                        $permission = Ability::find($key->permission_id);
                        if ($permission) {
                            \Bouncer::disallow($role)->to($permission);
                        }
                    }
                    //attach new permission to role
                    foreach ($permissions as $val) {
                        $perm = Ability::find($val);
                        if ($perm) {
                            \Bouncer::allow($role)->to($perm);
                        }
                    }
                    return $this->commonResponse(true, 'Role updated successfully!', new RoleResource($role->fresh()), Response::HTTP_OK);
                } else {
                    return $this->commonResponse(false, 'Role not found!', '', Response::HTTP_NOT_FOUND);
                }
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    /**
     * Delete Role by Id
     * @param int $id
     * @return JsonResponse
     */
    public function deleteRole(int $id): JsonResponse
    {
        $role = Role::find($id);
        if ($role) {
            $existing_permissions = AuthHelper::RawRolePermissions($id);
            //detach all permissions from role
            foreach ($existing_permissions as $key) {
                $permission = Ability::find($key->permission_id);
                if ($permission) {
                    \Bouncer::disallow($role)->to($permission);
                }
            }
            $role->delete();
            return $this->commonResponse(true, 'Role deleted', '', Response::HTTP_OK);
        } else {
            return $this->commonResponse(false, 'Role not found!', '', Response::HTTP_NOT_FOUND);
        }
    }
}
