<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferClient extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'staff_id' => ['required','integer','exists:users,id']
        ];
    }

    /**
     * Get the messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'staff_id.required' => 'The staff id field is required!',
            'staff_id.integer' =>  'The staff id field must be an integer!',
            'staff_id.exists' => 'The staff must be existing!',
        ];
    }
}
