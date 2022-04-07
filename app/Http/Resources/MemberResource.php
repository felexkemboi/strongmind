<?php

namespace App\Http\Resources;

use App\Helpers\AuthHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin User */
class MemberResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'profile_pic' => $this->profile_pic,
            'phone_number' => $this->phone_number,
            'profile_pic_url' => $this->profile_pic_url ? $this->profile_pic_url : '',
            'gender' => $this->gender,
            'member_type_id' => $this->member_type_id,
            'office_id' => $this->office_id,
            'region' => $this->region,
            'city' => $this->city,
            'invite_accepted' => $this->invite_accepted,
            'languages' => $this->languages,
            'roles' => AuthHelper::userRoles($this->id),
        ];
    }
}
