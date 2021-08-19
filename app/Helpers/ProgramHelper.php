<?php


namespace App\Helpers;
use App\Support\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramMember;

class ProgramHelper
{
    /**
     * @param $userId
     * @return \Illuminate\Support\Collection|null
     */
    public static function userPrograms($userId)
    {
        $userPrograms =  DB::table('programs')
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
        if($userPrograms->isEmpty()){
            return [];
        }
        return $userPrograms;
    }

    public static function members($programId)
    {
        return DB::table('users')
            ->select('users.*')
            ->join('program_members','program_members.user_id','=','users.id')
            ->join('programs','programs.id','=','program_members.program_id')
            ->where(function($query) use($programId){
                $query->where('programs.id',$programId);
            })
            ->whereNotNull('program_members.member_type_id')
            ->groupBy('program_members.member_type_id','users.id')
            ->distinct()
            ->get();
            //->toSql();

    }
}
