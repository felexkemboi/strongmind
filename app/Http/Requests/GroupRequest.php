<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'name' => ['required','string','unique:groups,name','min:3','max:30'],
            'group_type_id' => ['required','integer','not_in:0'], //exists:group_types,id
            'last_session' => ['nullable','date'],
            'office_id' => ['required','integer','exists:offices,id','not_in:0'],
            'project_id' => ['required','integer','exists:projects,id','not_in:0'],
            'cycle_id'  => ['integer','required','exists:cycles,id','not_in:0'],
            'group_id' => ['nullable'], //Autogenerated Country-Year-UID(unique id)
            'fascilitator_id' => ['integer','required','exists:users,id','not_in:0'],
            'supervisor_id' => ['integer','required','exists:users:id','not_in:0'],
            'therapy_mode_id' => ['integer','required','exists:therapy_modes,id','not_in:0'],
            'mode_of_delivery' => ['integer','required','exists:modes_of_delivery,id','not_in:0'],
            'group_allocation_date' => ['required','date']
        ];
    }
}
