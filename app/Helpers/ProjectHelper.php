<?php


namespace App\Helpers;
use App\Support\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Programs\Project;
use App\Models\Programs\ProgramMember;

class ProjectHelper
{
    /**
     * @param $userId
     * @return \Illuminate\Support\Collection|null
     */
    public static function userProjects($userId)
    {
        $userProjects =  DB::table('programs')
            ->select('programs.id as id', 'programs.name as name','programs.office_id as office_id','programs.program_code as program_code',
                'programs.program_type_id as program_type_id', 'programs.member_count as member_count'
            )->join('program_members','program_members.program_id','=','programs.id')
           ->join('users','users.id','=','program_members.user_id')
            ->where(function($query) use ($userId){
                $query->where('program_members.user_id',$userId);
            })
            ->distinct()
            ->orderBy('programs.id','DESC')
            ->get();
        if($userProjects->isEmpty()){
            return [];
        }
        return $userProjects;
    }

    public static function members($projectId)
    {
        return DB::table('users')
            ->select('users.id','users.name','users.email','users.profile_pic','users.phone_number',
                'users.gender','users.region','users.city','users.office_id','users.invite_accepted','users.languages',
                'program_members.member_type_id')
            ->join('program_members','program_members.user_id','=','users.id')
            ->join('programs','programs.id','=','program_members.program_id')
            ->where(function($query) use($projectId) {
                $query->where('programs.id', $projectId)
                    ->where('program_members.program_id', '=', $projectId);
            })
            ->whereNotNull('program_members.member_type_id')
            ->where('program_members.status', ProgramMember::MEMBERSHIP_ACTIVE)
            ->get();
    }
}
