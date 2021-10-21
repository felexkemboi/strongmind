<?php

namespace App\Http\Requests;

use App\Http\Controllers\SpatiePermissionController;
use App\Services\PermissionRoleService;
use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:60|unique:spatie_permissions,name',
        ];
    }
}
