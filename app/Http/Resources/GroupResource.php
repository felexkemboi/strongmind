<?php

namespace App\Http\Resources;

use App\Models\Group;
use App\Models\User;
use App\Services\GroupService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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
            'sessions' => GroupService::getSessions($this->id),
            'ongoing' => $this->ongoing === Group::SESSION_ONGOING ? 'Ongoing' : 'Terminated',
            'last_session' => $this->last_session,
            'group_type_id' => $this->group_type_id,
            'groupType' => $this->groupType,
        ];
    }
}
