<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionResponseRequest extends FormRequest
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
            'value'                   => 'string|required',
            'score'                   => 'integer',
            'question_id'             => 'required|integer|not_in:0|exists:questions,id',
            'client_id'               => 'required|integer|not_in:0|exists:clients,id',
            'question_option_id'      => 'not_in:0|exists:questionsoptions,id',
        ];
    }
}

