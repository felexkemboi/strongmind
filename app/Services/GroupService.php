<?php


namespace App\Services;


use App\Http\Resources\GroupTypeResource;
use App\Models\ClientBioData;
use App\Models\Group;
use App\Models\GroupClient;
use App\Models\GroupSession;
use App\Models\SessionAttendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class GroupService
{
    public static function getGroupData(Group $group): array
    {
        return [
            'id' => $group->id,
            'name' => $group->name,
            'sessions' => $group->sessions->transform(function($session){
                $attendance = $session->attendance->transform(function ($data){
                    $client = ClientBioData::firstWhere(function (Builder $query) use($data){
                        $query->where('client_id', $data->client_id);
                    });
                    return [
                        'attendanceId'  => $data->id,
                        'clientId'      => $data->client_id,
                        'clientName'    => isset($client) ? $client->first_name.' '.$client->last_name : '',
                        'attended'      => $data->attended,
                        'reason'        => $data->reason
                    ];
                });
                return [
                    'id' => $session->id,
                    'date' => $session->session_date,
                    'attendance' => $attendance
                ];
            }),
            'last_session' => $group->last_session !== null ? Carbon::parse($group->last_session)->format('d M Y') : null,
            'ongoing' => $group->ongoing === Group::SESSION_ONGOING ? 'Ongoing' : 'Terminated'
        ];
    }

    public static function viewGroupDetails(Group $group): array
    {
        $user = User::where(function(Builder $query) use($group){
            return $query->where('id', $group->staff_id);
        })->first();
        $clients = GroupClient::where('group_id', $group->id)->get();
        $sessions = GroupSession::select('id','created_at','session_date')->where('group_id',$group->id)->get();
        return [
            'id' => $group->id,
            'name' => $group->name,
            'clientsNo' => $clients->count(),
            'group_id' => $group->group_id,
            'clients' => $clients->transform(function($client){

                $clientDetails = ClientBioData::where('client_id',$client->client_id)->first();
                return [
                    'clientId' => $client->client_id,
                    'clientName' => isset($clientDetails) ? $clientDetails->first_name.' '.$clientDetails->last_name : '',
                ];
            }),
            'sessions' =>  $sessions->transform(function($session){
                if(isset($session)) {
                    $sessionsAttendance =  SessionAttendance::select('client_id','attended')
                    ->where('session_id',$session->id)
                    ->where('attended',1)
                    ->get();

                    $attendance = $sessionsAttendance->transform(function($sessionDetail){

                        $clientDetails = ClientBioData::where('client_id',$sessionDetail->client_id)->first();
                        return [
                            'clientId' => $sessionDetail->client_id ? $sessionDetail->client_id : '',
                            'clientName' => isset($clientDetails) ? $clientDetails->first_name .' '.$clientDetails->last_name : '',
                            'attended' => isset($clientDetails) ? $sessionDetail->attended : 0,
                        ];
                    });
                    return [
                        'session_id' => $session->id,
                        'created_at' => $session->created_at,
                        'attendance' => $attendance,
                        'session_date' => $session->session_date,
                    ];
                }
                return [];
            }),
            'last_session' => $group->last_session !== null ? Carbon::parse($group->last_session)->format('d M Y') : null,
            'ongoing' => $group->ongoing === Group::SESSION_ONGOING ? 'Ongoing' : 'Terminated',
            'group_type' => $group->groupType !== null ? new GroupTypeResource($group->groupType) : null,
            'staff' =>
                 [
                    'id' => $user->id,
                    'name' => $user->name,
                     'profile_pic_url' => $user->profile_pic_url,
                    'roles' => $user->roles->transform(function($role){
                        return [
                            'id' => $role->id,
                            'role_name' => $role->name
                        ];
                    }),
                ],
            'facilitator' => User::find($group->fascilitator_id) ? User::find($group->fascilitator_id) : 'No facilitor',
            'supervisor' => User::find($group->supervisor_id) ? User::find($group->supervisor_id) : 'No Supervisor'
        ];
    }

    public static function getSessionsWithAttendance(int $id)
    {
        $group = Group::with('sessions')->find($id);
        return $group->sessions->transform(function($session){
            $attendance = $session->attendance->transform(function ($data){
                $client = ClientBioData::firstWhere(function (Builder $query) use($data){
                    $query->where('client_id', $data->client_id);
                });
                return [
                    'attendanceId'  => $data->id,
                    'clientId'      => $data->client_id,
                    'clientName'    => isset($client) ? $client->first_name.' '.$client->last_name : '',
                    'attended'      => $data->attended,
                    'reason'        => $data->reason
                ];
            });
            return [
                'id' => $session->id,
                'date' => $session->session_date,
                'attendance' => $attendance
            ];
        });
    }
}
