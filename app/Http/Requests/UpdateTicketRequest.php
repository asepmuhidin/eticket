<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subject' => 'required|string|max:250',
            'message'=>'required',
            'status_id'=>'required',
            'type_id'=>'required',
            'custname'=>'required|string|max:100',
            'complain_date'=>'required|date',
            'complain_id'=>'required',
            'cluster_id'=>'required',
            'house_id'=>'required',
            'block'=>'required',
            'block_no'=>'required',
            
            'bast_date'=>'nullable|date',
            'renov_date'=>'nullable|date',
            'war_date'=>'nullable|date',
        ];
    }
}
