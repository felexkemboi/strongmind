<?php

namespace App\Http\Controllers;

use App\Actions\RoleAction;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Services\PermissionRoleService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use Exception;

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
        $this->permissionService->verifyPermission('view roles');
        return $roleAction->listRoles();
    }

    /**
     * Create Role
     *
     * @param RoleRequest $request
     * @param RoleAction $roleAction
     * @bodyParam name string required.
     * @return JsonResponse
     * @authenticated
     */
    public function store(RoleRequest $request, RoleAction $roleAction): JsonResponse
    {
        $this->permissionService->verifyPermission('create role');
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
        $this->permissionService->verifyPermission('view role details');
        return $roleAction->displayRole($id);
    }

    /**
     * Update Role
     *
     * @param RoleUpdateRequest $request
     * @param int $id
     * @param RoleAction $roleAction
     * @bodyParam name string required.
     * @return JsonResponse
     * @authenticated
     */
    public function update(RoleUpdateRequest $request, int $id, RoleAction $roleAction): JsonResponse
    {
        $this->permissionService->verifyPermission('edit role');
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
        $this->permissionService->verifyPermission('delete role');
        return $roleAction->deleteRole($id);
    }

}
