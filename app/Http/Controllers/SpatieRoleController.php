<?php

namespace App\Http\Controllers;

use App\Actions\RoleAction;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Services\PermissionRoleService;
use Illuminate\Http\JsonResponse;

/**
 * Roles and Permission Endpoints
 * Class SpatieRoleController
 * @package App\Http\Controllers
 * @group Roles
 */
class SpatieRoleController extends Controller
{
    public $permissionService;

    public function __construct(PermissionRoleService $permissionRoleService)
    {
        $this->permissionService = $permissionRoleService;
    }

    /**
     * List Roles
     *
     * @param RoleAction $roleAction
     * @return JsonResponse
     * @authenticated
     */
    public function index(RoleAction $roleAction): JsonResponse
    {
        $this->permissionService->verifyUserHasPermissionTo('view roles');
        return $roleAction->listRoles();
    }

    /**
     * Create Role
     *
     * @param RoleRequest $request
     * @param RoleAction $roleAction
     * @bodyParam name string required . The role name
     * @bodyParam role_code string required . The Role Code
     * @bodyParam description text. The role description
     * @bodyParam permission_id array required . An array of permissions . Example : [1,2,3]
     * @return JsonResponse
     * @authenticated
     */
    public function store(RoleRequest $request, RoleAction $roleAction): JsonResponse
    {
        $this->permissionService->verifyUserHasPermissionTo('create role');
        return $roleAction->createRole($request);
    }

    /**
     * Display Role Details
     *
     * @param int $id
     * @param RoleAction $roleAction
     * @return JsonResponse
     * @authenticated
     */
    public function show(int $id, RoleAction $roleAction): JsonResponse
    {
        $this->permissionService->verifyUserHasPermissionTo('view role details');
        return $roleAction->displayRole($id);
    }

    /**
     * Update Role
     *
     * @param RoleUpdateRequest $request
     * @param int $id
     * @param RoleAction $roleAction
     * @bodyParam name string required .
     * @bodyParam role_code string. The Role's Role Code
     * @bodyParam description string. The Role's Description
     * @bodyParam permission_id integer. An Array of permission_id(s) e.g [1,2,3]
     * @return JsonResponse
     * @authenticated
     */
    public function update(RoleUpdateRequest $request, int $id, RoleAction $roleAction): JsonResponse
    {
        $this->permissionService->verifyUserHasPermissionTo('edit role');
        return $roleAction->updateRole($request, $id);
    }

    /**
     * Delete Role
     *
     * @param int $id
     * @param RoleAction $roleAction
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id, RoleAction $roleAction): JsonResponse
    {
        $this->permissionService->verifyUserHasPermissionTo('delete role');
        return $roleAction->deleteRole($id);
    }

}
