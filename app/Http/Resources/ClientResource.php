<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'other_name' => $this->other_name,
            'nick_name' => $this->nick_name,
            'date_of_birth' => $this->date_of_birth,
            'nationality' => $this->nationality,
            'education_level_id' => $this->education_level_id,
            'marital_status_id' => $this->marital_status_id,
            'phone_ownership_id' => $this->phone_ownership_id,
            'project_id' => $this->project_id,
            'is_disabled' => $this->is_disabled,
            'patient_id' => $this->patient_id,
            'phone_number' => $this->phone_number,
            'country_id' => $this->country_id,
            'gender' => $this->gender,
            'region' => $this->region,
            'city' => $this->city,
            'timezone_id' => $this->timezone_id,
            'languages' => $this->languages,
            'age' => $this->age,
            'client_type' => $this->client_type,
            'therapy' => $this->therapy === 1 ? true: false,
            'status_id' => $this->status_id,
            'channel_id' => $this->channel_id,
            'staff_id' => $this->staff_id,
            'active' => $this->active === 1 ? true:false,
            'status' => $this->status,
            'channel' => $this->channel,
            'staff' => $this->staff,
            'timezone' => $this->timezone,
            'country' => $this->country,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
