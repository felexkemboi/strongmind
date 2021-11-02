<?php

namespace App\Http\Controllers;

use App\Actions\PermissionAction;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Services\PermissionRoleService;
use Illuminate\Http\JsonResponse;

/**
 * Roles and Permission Endpoints
 * Class SpatiePermissionController
 * @package App\Http\Controllers
 * @group Permissions
 */
class SpatiePermissionController extends Controller
{
    public $permissionService;

    public function __construct(PermissionRoleService $permissionRoleService)
    {
        $this->permissionService = $permissionRoleService;
    }

    /**
     * List permissions
     * @param PermissionAction $permissionAction
     * @return JsonResponse
     * @authenticated
     */
    public function index(PermissionAction $permissionAction): JsonResponse
    {
        $this->permissionService->verifyUserHasPermissionTo('view permissions');
        return $permissionAction->listPermissions();
    }

    /**
     * Create Permission
     * @bodyParam name string . The name of the permission
     * @param PermissionRequest $request
     * @param PermissionAction $permissionAction
     * @bodyParam name string required.
     * @return JsonResponse
     * @authenticated
     */
    public function store(PermissionRequest $request,PermissionAction $permissionAction): JsonResponse
    {
        $this->permissionService->verifyUserHasPermissionTo('create permission');
        return $permissionAction->createPermission($request);
    }

    /**
     * List permission details
     *
     * @param PermissionAction $permissionAction
     * @param int $id
     * @return JsonResponse
     * @authenticated
     */
    public function show(PermissionAction $permissionAction, int $id): JsonResponse
    {
        $this->permissionService->verifyUserHasPermissionTo('view permission details');
        return $permissionAction->displayPermission($id);
    }

    /**
     * Update Permission
     *
     * @param PermissionUpdateRequest $request
     * @param int $id
     * @param PermissionAction $permissionAction
     * @bodyParam name string required.
     * @return JsonResponse
     * @authenticated
     */
    public function update(PermissionUpdateRequest $request, int $id, PermissionAction $permissionAction): JsonResponse
    {
        $this->permissionService->verifyUserHasPermissionTo('update permission');
        return $permissionAction->updatePermission($request, $id);
    }

    /**
     * Delete Permission
     *
     * @param int $id
     * @param PermissionAction $permissionAction
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id, PermissionAction $permissionAction): JsonResponse
    {
        $this->permissionService->verifyUserHasPermissionTo('delete permission');
        return $permissionAction->deletePermission($id);
    }
}
