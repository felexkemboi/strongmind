<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionAttendanceRequest extends FormRequest
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
            'client_id' => ['string','required'],
            //'client_id.*' => ['integer','required','not_in:0','exists:clients,id','distinct'],
            'reason' => ['string','min:3','max:255','nullable'],
            'attended' => ['boolean','required']
        ];
    }
}
