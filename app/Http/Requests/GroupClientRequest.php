<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupClientRequest extends FormRequest
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
            'client_id' => ['array','required','min:1'],
            'client_id.*' => ['integer','required','not_in:0','distinct','exists:clients,id']
        ];
    }
}
