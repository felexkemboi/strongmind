<?php

namespace App\Http\Controllers\Groups;

use App\Actions\GroupAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupClientRequest;
use App\Http\Requests\GroupRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Services\PermissionRoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * @queryParam name string. Search by group name
     * @queryParam staff string. Search by staff name
     * @queryParam last_session date. Search by date
     * @queryParam sort string. Sort by either name(string) , last_session(date) or dateOfCreation(date)
     * @queryParam pagination_items integer. Paginate by specified number of items
     * @param Request $request
     * @return JsonResponse
     * @authenticated
     */
    public function index(Request $request): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('list groups');
        return $this->groupAction->listGroups($request);
    }

    /**
     * Create Group
     *
     * @param GroupRequest $request
     * @bodyParam name string required .
     * @bodyParam group_type_id integer required . Group Type
     * @bodyParam office_id integer required . The Group Office ID . Example: 1
     * @bodyParam project_id integer required . The Group Project ID . Example: 1
     * @bodyParam cycle_id integer required . The Group Cycle ID . Example: 1
     * @bodyParam fascilitator_id integer required . The Group Fascilitator 1
     * @bodyParam supervisor_id integer required . The Group Supervisor . Example 1
     * @bodyParam therapy_mode_id integer required . The Group Therapy Mode ID . Example: 1
     * @bodyParam mode_of_delivery_id integer required . The Group Mode Of Delivery ID . Example: 1
     * @bodyParam group_allocation_date date required . The Group Allocation Date
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
     * @urlParam  id integer required .
     * @bodyParam name string required
     * @bodyParam group_type_id integer
     * @bodyParam office_id integer. The Group's Office ID . Example: 1
     * @bodyParam project_id integer. The Group's Project ID . Example: 1
     * @bodyParam cycle_id integer. The Group's Cycle ID . Example: 1
     * @bodyParam fascilitator_id integer. The Group's Fascilitator ID . Example: 1
     * @bodyParam supervisor_id integer. The Group's Supervisor ID. Example: 1
     * @bodyParam therapy_mode_id integer. The Group's Therapy Mode ID. Example: 1
     * @bodyParam group_allocation_date date. The Group's Allocation Date
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

    /**
     * Add Clients To Group
     * @param GroupClientRequest $request
     * @param int $id
     * @return JsonResponse
     * @urlParam id integer required . The Group ID . Example: 1
     * @bodyParam client_id array required . The Client ID's . Example [1,2,3]
     * @authenticated
     */
    public function addClients(GroupClientRequest $request,int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('add clients to a group');
        return $this->groupAction->addClientsToGroup($request, $id);
    }

    /**
     * List Clients By Group
     * @param int $id
     * @urlParam id integer required . The Group ID . Example: 1
     * @return JsonResponse
     * @authenticated
     */
    public function listClients(int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('list clients by group');
        return $this->groupAction->listClientsByGroupId($id);
    }

    /**
     * List Group Clients By Staff
     * @param int $id
     * @urlParam id integer required . The Group ID . Example: 1
     * @return JsonResponse
     * @authenticated
     * @hideFromAPIDocumentation
     */
    public function listGroupClientsByStaff(int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('list group clients by staff member');
        return $this->groupAction->listClientsByStaff($id);
    }
}
