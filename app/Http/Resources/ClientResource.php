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
