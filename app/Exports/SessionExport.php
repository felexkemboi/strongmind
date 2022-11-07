<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use App\Models\Group;

class SessionExport implements FromCollection,WithHeadings
{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function collection()
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

                $sessions = $sessions.date_format(date_create($session['session_date']),"Y-m-d").',';
            }
            $formattedGroup = ['group' => $group->name, 'sessions' => rtrim($sessions, ",")];
            $formattedGroups->push($formattedGroup);
        }
        return collect($formattedGroups);
    }

    /**
     * Write code on Method
     *
     * @return response()
      */
    public function headings() :array
     {
        \Log::debug([
            'Group',
            'Sessions',
        ]);
        return [
            'Group',
            'Sessions',
        ];
     }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 100,
        ];
    }
}
