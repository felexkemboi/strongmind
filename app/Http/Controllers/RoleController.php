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
use Illuminate\Support\Str;
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
                $slug=Str::slug($request->name);
                $role_exists=Role::firstWhere('name', $slug);
                if ($role_exists) {
                    return $this->commonResponse(false, 'Role already exists!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
                } else {
                    $role = new Role;
                    $role->name =$slug;
                    $role->title =$request->name;
                    $role->code =$request->role_code;
                    $role->description = $request->description;
                    $role->save();
                    $permissions=$request->access_permissions;
                    foreach ($permissions as $val) {
                        $perm=Ability::find($val);
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
    // end create role
}
