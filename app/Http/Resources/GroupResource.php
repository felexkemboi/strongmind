<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
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
            'group_type_id' => $this->group_type_id,
            'last_session' => $this->last_session,
            'staff' => $this->staff,
            'groupType' => $this->groupType
        ];
    }
}
