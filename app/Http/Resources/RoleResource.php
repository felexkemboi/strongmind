<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'role_id'=>$this->id,
          'slug'=>$this->name,
          'title'=>$this->title,
        ];
    }
}
