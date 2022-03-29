<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateResponsesRequest extends FormRequest
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
            // 'responses'                    => 'required|array',
            // 'responses.value'              => 'string|required',
            // 'responses.question_id'        => 'required|integer|not_in:0|exists:questions,id',
            // 'responses.client_id'          => 'required|integer|not_in:0|exists:clients,id',
            // 'responses.question_option_id' => 'not_in:0|exists:questionsoptions,id',
        ];
    }
}
