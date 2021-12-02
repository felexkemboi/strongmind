<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
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
            'name' => ['nullable','string','min:3','max:60'],
            'role_code' => ['string','min:2','max:30'],
            'description' => ['string','nullable','min:3','max:60'],
            'permission_id' => ['required','array','min:1'],
            'permission_id.*' => ['required','integer','exists:spatie_permissions,id','distinct']
        ];
    }
}
