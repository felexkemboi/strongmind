<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditQuestionOptionsRequest extends FormRequest
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
            'score'          => 'integer',
            'value'          => 'string|required',
            'question_id'    => 'integer|not_in:0|exists:questions,id',
        ];
    }
}
