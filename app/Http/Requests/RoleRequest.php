<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => ['required','string','min:3','max:60','unique:spatie_roles,name'],
            'role_code' => ['string','unique:spatie_roles,role_code','required','min:2','max:30'],
            'description' => ['string','nullable','min:3','max:60'],
            'permission_id' => ['array','required','min:1'],
            'permission_id.*' => ['integer','required','not_in:0','exists:spatie_permissions,id']
        ];
    }
}
