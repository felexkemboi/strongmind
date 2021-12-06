<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionRequest extends FormRequest
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
            'required'            => 'boolean',
            'multiple_selection'  => 'boolean',
            'description'         => 'string|required',
            'form_id'             => 'integer|not_in:0|exists:forms,id',
            'field_type_id'       => 'integer|not_in:0|exists:field_type,id',
            'question_options_id' => 'integer|not_in:0|exists:questionsoptions,id',

        ];
    }
}
