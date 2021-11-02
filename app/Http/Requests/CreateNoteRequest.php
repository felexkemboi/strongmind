<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNoteRequest extends FormRequest
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
            'private.required' => 'The private field is required!',
        ];
    }
}
