<?php

namespace App\Http\Controllers\Groups;

use App\Models\Group;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\GroupSession;
use App\Exports\SessionExport;
use App\Models\Programs\Project;
use Illuminate\Http\JsonResponse;
use App\Models\SessionAttendance;
use App\Actions\GroupSessionAction;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\PermissionRoleService;
use App\Exports\SessionAttendanceExport;
use App\Http\Requests\GroupSessionRequest;
use App\Models\ClientBioData;

/**
 * Manage Group Sessions
 *
 * Class GroupSessionController
 *
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
     * @urlParam id integer required . The Project ID
     * @return JsonResponse
     * @authenticated
     */
    public function downloadSessions($id)
    {
        $project = Project::findOrFail($id);
        return Excel::download(new SessionExport($project), $project->name.' Sessions.csv');
    }

    /**
     * Download group session attendance
     *
     * @param int $id
     * @param Group $group
     * @urlParam id integer required . The group ID
     * @return JsonResponse
     * @authenticated
     */
    public function downloadSessionAttendance(int $id)
    {
        $group = Group::findOrFail($id);

        $heads = array('Client Name', 'Patient ID');
        $sessionIDs = collect([]);
        $clientAttendance = collect([]);

        $groupSessions = GroupSession::select('id','session_date')->where('group_id', $id)->get();

        foreach($groupSessions as $groupSession){
            array_push($heads,date_format(date_create($groupSession['session_date']),"Y-m-d"));
            $sessionIDs->push($groupSession['id']);
        }

        $sessionAttendances = SessionAttendance::select('client_id','attended')->whereIn('session_id', $sessionIDs)->get();

        foreach($sessionAttendances as $sessionAttendance){
            $bioData = ClientBioData::where('client_id', '=', $sessionAttendance['client_id'])->first();
            $client = Client::find($sessionAttendance['client_id']);
            $record = array('client' => $client->name ? $client->name : ($bioData ? $bioData->first_name.' '.$bioData->last_name : 'No Name'), 'patient_id' => $client ? $client->patient_id : '');
            foreach($sessionIDs as $sessionID){
                $attended = SessionAttendance::select('attended')->where('session_id', $sessionID)->where('client_id', $client ? $client->id : '')->get();
                $ifAttended = $attended->count() > 0 ? ($attended[0]['attended'] == 1 ? "Attended" : "Not Attended") : "Not Recorded";
                array_push($record, $ifAttended);
            }
            $clientAttendance->push($record);
        }
        $data = ['headings' => $heads, 'data' => $clientAttendance];

        return Excel::download(new SessionAttendanceExport($data), $group->name.' Sessions.csv');
    }
}
