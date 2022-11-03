<?php

namespace App\Http\Controllers\Groups;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Exports\SessionExport;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Actions\GroupSessionAction;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\PermissionRoleService;
use App\Http\Requests\GroupSessionRequest;



/**
 * Manage Group Sessions
 * Class GroupSessionController
 * @package App\Http\Controllers\Groups
 * @group Groups
 */
class GroupSessionController extends Controller
{
    public $permissionRoleService;
    public $groupSessionAction;

    public function __construct(PermissionRoleService $permissionRoleService, GroupSessionAction $groupSessionAction){
        $this->permissionRoleService = $permissionRoleService;
        $this->groupSessionAction = $groupSessionAction;
    }

    /**
     * List Group Sessions
     *
     * @param $id
     * @return JsonResponse
     * @authenticated
     */
    public function index($id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('list groups with their respective sessions');
        return $this->groupSessionAction->listSessions($id);
    }

    /**
     * Add Group Session
     *
     * @param GroupSessionRequest $request
     * @param int $id
     * @urlParam id integer required . The Group ID
     * @bodyParam session_date date required . The Session Date
     * @return JsonResponse
     * @authenticated
     */
    public function store(GroupSessionRequest $request, int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('create session in a group');
        return $this->groupSessionAction->createSession($request, $id);
    }

    /**
     * Display Group Session Details
     *
     * @param int $id
     * @urlParam id integer required . The Session ID
     * @return JsonResponse
     * @authenticated
     */
    public function show(int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('view session details');
        return $this->groupSessionAction->viewSessionDetails($id);
    }

    /**
     * Update Group Session
     *
     * @param Request $request
     * @param int $id
     * @urlParam id integer required . The Group Session ID . Example :1
     * @bodyParam session_date date required . The Session Date
     * @return JsonResponse
     * @authenticated
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('update group session');
        return $this->groupSessionAction->updateSession($request,$id);
    }

    /**
     * Delete Group Session
     *
     * @param int $id
     * @urlParam id integer required . The Session ID . Example: 1
     * @return JsonResponse
     * @authenticated
     */
    public function destroy(int $id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('delete group session');
        return $this->groupSessionAction->deleteSession($id);
    }

    /**
     * List Session Attendance
     * @param $id
     * @urlParam id integer required . The Session ID
     * @return JsonResponse
     * @authenticated
     */
    public function listAttendance($id): JsonResponse
    {
        $this->permissionRoleService->verifyUserHasPermissionTo('view session attendance');
        return $this->groupSessionAction->listSessionAttendance($id);
    }

    /**
     * Download sessions
     * @return JsonResponse
     * @authenticated
     */
    public function download()
    {

        $group_sessions =  DB::table('group_sessions')
                                ->groupBy('group_id')
                                ->get()
                                ->pluck('group_id');

        $groups = Group::select('name','id')
                            ->whereIn('id', $group_sessions)
                            ->with('sessions')
                            ->get();

        $formattedGroups = collect([]);
        foreach ($groups as $group) {
            $sessions = '';
            foreach($group['sessions'] as $session){
                $sessions = $sessions.$session['session_date'].',';
            }
            $formattedGroup = ['group' => $group->name, 'sessions' => $sessions];
            $formattedGroups->push($formattedGroup);
        }

        return Excel::download(new SessionExport($formattedGroups), 'sessions.csv');
    }
}
