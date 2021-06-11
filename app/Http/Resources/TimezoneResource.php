<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimezoneResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'timezone_id' => $this->id,
            'name' => $this->name,
            'utc' => $this->utc,
            'active' => $this->active,
        ];
    }
}
