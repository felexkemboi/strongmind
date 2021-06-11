<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'permission_id'=>$this->id,
            'slug'=>$this->name,
            'module'=>$this->module_name,
            'title'=>$this->title,
        ];
    }
}
