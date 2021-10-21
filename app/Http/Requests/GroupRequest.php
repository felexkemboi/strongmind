<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'name' => ['required','string','unique:groups,name','min:3','max:30'],
            'group_type_id' => ['required','integer','not_in:0','exists:group_types,id'],
            'last_session' => ['nullable','datetime'],
        ];
    }
}
