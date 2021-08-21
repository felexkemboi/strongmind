<?php

namespace App\Http\Resources\Programs;

use App\Helpers\ProgramHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
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
            'office_id' => $this->office_id,
            'program_type_id' => $this->program_type_id,
            'member_count' => $this->member_count,
            'program_code' => $this->program_code,
            'colour_option' => $this->colour_option,
            'office' => $this->office,
            'programType' => $this->programType,
            'members' => ProgramHelper::members($this->id),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
