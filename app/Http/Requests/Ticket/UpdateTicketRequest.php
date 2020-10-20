<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
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
            'title'=>'required',
            'content'=>'required',
            'assign_id'=>'required|integer',
            'board_id'=>'required|integer',
            'priority_id'=>'required|integer',
            'column_id'=>'required|integer',
            'parent_id'=>'nullable|integer',

        ];
    }
}
