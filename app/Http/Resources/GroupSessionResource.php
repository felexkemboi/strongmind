<?php

namespace App\Http\Resources;

use App\Models\ClientBioData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupSessionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'sessionId' => $this->id,
            'groupId' => $this->group_id,
            'sessionDate' => $this->session_date,
            'totalClients' => $this->total_clients,
            'totalPresent' => $this->total_present,
            'attendance' => $this->attendance->transform(function ($data){
                $client = ClientBioData::select('first_name','last_name','other_name')->firstWhere(function (Builder $query) use($data){
                    $query->where('client_id', $data->client_id);
                });
                return [
                    'clientId'      => $data->client_id,
                    'attendanceId'  => $data->id,
                    'clientName'    => isset($client) ? $client->first_name.' '.$client->last_name : '',
                    'attended'      => $data->attended,
                    'reason'        => $data->reason
                ];
            })
        ];
    }
}
