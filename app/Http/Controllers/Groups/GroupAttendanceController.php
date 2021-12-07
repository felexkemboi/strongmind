<?php

namespace App\Http\Controllers\Groups;

use App\Actions\GroupSessionAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\SessionAttendanceRequest;
use App\Services\PermissionRoleService;
use Illuminate\Http\JsonResponse;

/**
 * Manage Group Attendance
 * Class GroupAttendanceController
 * @package App\Http\Controllers\Groups
 * @group Groups
 */
class GroupAttendanceController extends Controller
{
    public $permissionRoleService;
    public $groupSectionAction;

    public function __construct(PermissionRoleService $permissionRoleService, GroupSessionAction $groupSectionAction)
    {
        $this->permissionRoleService = $permissionRoleService;
        $this->groupSectionAction = $groupSectionAction;
    }

    /**
     * Record Session Attendance
     *
     * @param SessionAttendanceRequest $request
     * @param int $id
     * @return JsonResponse
     * @urlParam id integer required . The Session ID
     * @bodyParam client_id array required . The Client ID(s) . Example: [1,2,3]
     * @bodyParam reason string. The Reason for client no-n-attendance .
     * @bodyParam attended boolean required . Whether client attended session or not . false|true
     * @authenticated
     */
    public function index(SessionAttendanceRequest $request, int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('take session attendance of a group');
        return $this->groupSectionAction->recordSessionAttendance($request, $id);
    }

    /**
     * Display Session Details with Attendance
     * @param int $id
     * @urlParam id integer required . The SessionID.
     * @return JsonResponse
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('view session attendance details');
        return $this->groupSectionAction->listSessionAttendance($id);
    }
}
