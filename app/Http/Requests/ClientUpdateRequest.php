<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|min:3|max:60',
            'gender' => 'nullable|string|in:Male,Female',
            'phone_number' => 'nullable', //min:10|max:13
            'country_id' => 'nullable|integer|exists:countries,id',
            'languages' => 'nullable|string|min:3|max:30',
            'region' => 'nullable|string|min:3|max:20',
            'city' => 'nullable|string|min:3|max:20',
            'timezone_id' => 'nullable|integer|exists:timezones,id',
            'age' => 'nullable|integer|not_in:0',
            'first_name' => 'nullable|string|min:3|max:30',
            'last_name' => 'nullable|string|min:3|max:30',
            'other_name' => 'nullable|string|min:3|max:30',
            'nick_name' => 'nullable|string|min:3|max:30',
            'project_id' => 'nullable|integer|not_in:0|exists:programs,id',
            'education_level_id' => 'nullable|integer|not_in:0|exists:client_education_levels,id',
            'marital_status_id' => 'nullable|integer|not_in:0|exists:client_marital_statuses,id',
            'phone_ownership_id' => 'nullable|integer|not_in:0|exists:client_phone_ownerships,id',
            'is_disabled' => 'nullable|boolean',
            'district_id' => 'nullable|integer|not_in:0|exists:client_districts,id',
            'province_id' => 'nullable|integer|not_in:0|exists:client_municipalities,id',
            'sub_county_id' => 'nullable|integer|not_in:0|exists:client_sub_counties,id',
            'parish_ward_id' => 'nullable|integer|not_in:0|exists:client_parishes,id',
            'village_id' => 'nullable|integer|not_in:0|exists:client_villages,id',
            'program_type_id' => 'nullable|integer|not_in:0|exists:program_types,id',
            'status_id' => 'nullable|integer|not_in:0|exists:statuses,id',
            'channel_id' => 'nullable|integer|not_in:0|exists:channels,id',
        ];
    }
}
