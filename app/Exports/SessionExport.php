<?php

namespace App\Exports;

use App\Models\Group;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SessionExport implements FromCollection,WithHeadings
{
    protected $project;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct($project)
    {
        $this->project = $project;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function collection()
    {

        $groups = Group::select('name','id')
            ->where('project_id', $this->project->id)
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
        return [
            'Group',
            'Sessions',
        ];
    }
}
