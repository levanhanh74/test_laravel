<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTeam extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'team_id' => 'required|min:2',
            'team_name' => 'required|min:2',
            'department_id' => 'required|min:2',
        ];
    }
    public function messages()

    {
        return [
            'required' => 'You have enter attribute :attribute nay!',
            'min' => 'You have enter this attribute :attribute less enough :min!',
        ];
    }
}
