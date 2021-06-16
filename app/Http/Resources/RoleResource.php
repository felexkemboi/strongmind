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
          'name'=>$this->title,
          'role_code'=>$this->code,
          'description'=>$this->description,
        ];
    }
}
