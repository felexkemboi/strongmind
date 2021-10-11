<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => ['required|min:6|exists:users,invite_id'],
            'invite' => ['required'],
            'name' => ['required'],
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
            'password.required' => 'The password field is required!',
            'password.min:6' =>  'The password must be more than 6 characters',
            'invite.required' => 'The invite field is required!',
            'name.required' => 'The name field is required!',

        ];
    }
}
