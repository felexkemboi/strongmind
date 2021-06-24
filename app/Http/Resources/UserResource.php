<?php

namespace App\Http\Resources;

use App\Helpers\AuthHelper;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'profile_pic' => $this->profile_pic,
            'profile_pic_url' => $this->profile_pic_url,
            'gender' => $this->gender,
            'region' => $this->region,
            'city' => $this->city,
            'languages' => $this->languages,
            'invite_accepted' => $this->invite_accepted,
            'timezone_id' => $this->timezone_id,
            'timezone' => $this->timezone,
            'office' => $this->office,
            'role'=>AuthHelper::UserRole($this->id) ?? '',
            'is_admin' => $this->is_admin,
            'active' => $this->active,
            'office_id' => $this->office_id,
            'last_login' => $this->last_login,
            'created_at' => $this->created_at,
        ];
    }
}
