<?php


namespace App\Services;


use App\Http\Resources\GroupTypeResource;
use App\Models\Client;
use App\Models\ClientBioData;
use App\Models\Group;
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
                return [
                    'id' => $session->id,
                    'date' => $session->session_date
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
        return [
            'id' => $group->id,
            'name' => $group->name,
            'group_id' => $group->group_id,
            'sessions' => $group->sessions->transform(function($session){
                return [
                    'id' => $session->id,
                    'date' => $session->session_date
                ];
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
            'attendance' => $group->attendance->transform(function($attendance) use($group){
                $client = ClientBioData::select('first_name','last_name')->where(function(Builder $query) use($attendance){
                    $query->where('client_id', $attendance->client_id);
                })->first();
                $groupAttendance = SessionAttendance::where(function(Builder $query) use($attendance){
                    $query->where('session_id', $attendance->session_id);
                })->first();
                $groupSessions = GroupSession::where(function(Builder $query) use($group){
                    $query->where('group_id', $group->id);
                })->get()->filter(function ($query) use($attendance){
                    return $query->where('id',$attendance->session_id);
                });
                $sessionData = [];
                foreach($groupSessions as $session){
                        $sessionData[] = [
                            'sessionDate' => $session->session_date,
                            'sessionId'   => $session->id,
                            'attended'    => $groupAttendance->attended
                        ];
                }
                return [
                    'clientName' => $client->first_name .' '. $client->last_name,
                    'sessions'  => $sessionData
                ];
            })
        ];
    }
}
