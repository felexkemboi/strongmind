<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNoteRequest extends FormRequest
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
            'notes' => 'required|string|min:5|max:255',
            'private' => 'required|boolean',
            'client_id' => 'required',
            'staff_id' => 'required',

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
            'notes.required' => 'The notes field is required!',
            'notes.min:5' =>  'The password must be more than 5 characters',
            'notes.max:5' =>  'The password must be less than 255 characters',
            'notes.string' =>  'The password must be a string',
            'private.boolean' =>  'The password must be of type boolean',
            'private.required' => 'The private field is required!',
            'client_id.required' => 'The Client ID field is required!',
            'staff_id.required' => 'The Staff ID field is required!',
        ];
    }
}
