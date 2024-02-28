<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ValidateFormDepartment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'department_id' => 'required|min:2',
            'department_name' => 'required|min:2',
            'descriptions' => 'required|min:8',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'You have enter this attribute :attribute !',
            'min' => 'You have enter this attribute :attribute less enough :min!',
        ];
    }
}
