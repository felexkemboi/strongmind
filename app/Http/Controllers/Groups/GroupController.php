<?php

namespace App\Http\Controllers\Groups;

use App\Actions\GroupAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Models\Group;
use App\Services\PermissionRoleService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Exception;

/**
 * Groups Endpoints
 *
 * Class GroupController
 * @package App\Http\Controllers\Groups
 * @group Groups
 */
class GroupController extends Controller
{
    public $permissionRoleService;
    public $groupAction;

    public function __construct(PermissionRoleService $permissionRoleService, GroupAction $groupAction){
        $this->permissionRoleService = $permissionRoleService;
        $this->groupAction = $groupAction;
    }

    /**
     * List Groups
     *
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('list groups');
        return $this->groupAction->listGroups();
    }

    /**
     * Create Group
     *
     * @param GroupRequest $request
     * @bodyParam name string required.
     * @bodyParam group_type_id integer required.
     * @return JsonResponse
     * @authenticated
     */
    public function store(GroupRequest $request): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('create group');
        return $this->groupAction->createGroup($request);
    }

    /**
     * Display Group Details
     *
     * @param int $id
     * @return JsonResponse
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('view group item');
        return $this->groupAction->viewGroupItem($id);
    }

    /**
     * Update Group
     *
     * @param GroupUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     * @bodyParam id integer required .
     * @bodyParam name string required
     * @bodyParam group_type_id integer
     * @authenticated
     */
    public function update(GroupUpdateRequest $request, int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('update group');
        return $this->groupAction->updateGroupItem($request, $id);
    }

    /**
     * Delete Group
     *
     * @param int $id
     * @return JsonResponse
     * @bodyParam id integer required . Example 1
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('delete group');
        return $this->groupAction->deleteGroup($id);
    }

    /**
     * Terminate Group
     *
     * @param int $id
     * @bodyParam id integer required . Example 1
     * @return JsonResponse
     * @authenticated
     */
    public function terminate(int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('terminate group');
        return $this->groupAction->terminateGroup($id);
    }
}
