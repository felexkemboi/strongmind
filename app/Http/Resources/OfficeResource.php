<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Office */
class OfficeResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'country_id' => $this->country_id,
            'country' => $this->country->name ?? 'Global',
            'name' => $this->name,
            'member_count' => $this->member_count,
            'active' => $this->active,
            'created_at' => $this->created_at->format('Y-m-d'),
            'programs' => $this->programs,
            'members' => $this->members,
        ];
    }
}
