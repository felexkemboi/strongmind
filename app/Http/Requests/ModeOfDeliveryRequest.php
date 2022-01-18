<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeOfDeliveryRequest extends FormRequest
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
            'name' => ['string','required','min:3','max:60','unique:modes_of_delivery,name']
        ];
    }
}
