<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupUpdateRequest extends FormRequest
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
            'name' => ['nullable','string','min:3','max:30'],
            'group_type_id' => ['nullable','integer','not_in:0','exists:group_types,id'],
            'last_session' => ['nullable','date'],
            'office_id' => ['nullable','integer','not_in:0','exists:offices,id'],
            'project_id' => ['nullable','integer','not_in:0','exists:programs,id'],
            'cycle_id'  => ['integer','nullable','not_in:0','exists:cycle,id'],
            'fascilitator_id' => ['integer','nullable','not_in:0','exists:users,id'],
            'supervisor_id' => ['integer','nullable','not_in:0','exists:users,id'],
            'staff_id' => ['integer','nullable','not_in:0','exists:users,id'],
            'therapy_mode_id' => ['integer','nullable','not_in:0','exists:therapy_mode,id'],
            'mode_of_delivery_id' => ['integer','nullable','not_in:0','exists:modes_of_delivery,id'],
            'group_allocation_date' => ['nullable','date']
        ];
    }
}
