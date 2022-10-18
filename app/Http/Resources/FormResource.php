<?php

namespace App\Http\Resources;

use App\Models\Misc\Status;
use App\Helpers\ClientFormHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class FormResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'assessment' => $this->assessment,
            "response_count" => $this->response_count,
            'status_id' => $this->status_id,
            "status" => Status::find($this->status_id) ? Status::find($this->status_id) : '',
            'clients' => ClientFormHelper::getFormClients($this->id),
            'published_at' => $this->published_at,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "deleted_at" => $this->deleted_at,
        ];
    }
}
