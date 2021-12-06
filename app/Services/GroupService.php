<?php


namespace App\Services;


use App\Http\Resources\GroupTypeResource;
use App\Models\Client;
use App\Models\Group;
use App\Models\GroupSession;
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
                return ['date' => Carbon::parse($session->session_date)->format('d M Y') ];
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
                return ['date' => Carbon::parse($session->session_date)->format('d M Y') ];
            }),
            'last_session' => $group->last_session !== null ? Carbon::parse($group->last_session)->format('d M Y') : null,
            'ongoing' => $group->ongoing === Group::SESSION_ONGOING ? 'Ongoing' : 'Terminated',
            'group_type' => $group->groupType !== null ? new GroupTypeResource($group->groupType) : null,
            'staff' =>
                 [
                    'id' => $user->id,
                    'name' => $user->name,
                    'roles' => $user->roles->transform(function($role){
                        return [
                            'id' => $role->id,
                            'role_name' => $role->name
                        ];
                    }),
                ],
            'attendance' => $group->attendance->transform(function($attendance){
                return [
                    'clientName' => Client::where(function(Builder $query) use($attendance){
                        $query->where('id', $attendance->client_id);
                    })->pluck('name'),
                    'sessionDate' => GroupSession::where(function(Builder $query) use($attendance){
                        $query->where('id', $attendance->sesion_id);
                    })->pluck('session_date'),
                    'sessionId' => $attendance->session_id,
                    'attended'  => $attendance->attended
                ];
            })
        ];
    }
}
