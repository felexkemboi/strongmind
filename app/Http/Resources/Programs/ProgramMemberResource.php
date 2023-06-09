<?php

namespace App\Http\Resources\Programs;

use App\Http\Resources\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramMemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'program_id' => $this->program_id,
            'member_type_id' => $this->member_type_id,
            'status' => $this->status,
            'user_id' => $this->user_id,
            //'programs' => ProgramResource::collection($this->programs),
            'members' =>  UserResource::collection($this->users),
            'memberTypes' => $this->memberTypes,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
