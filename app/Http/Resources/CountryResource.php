<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Country */
class CountryResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'country_id' => $this->id,
            'name' => $this->name,
            'dialing_code' => $this->dialing_code,
            'active' => $this->active,
        ];
    }
}
