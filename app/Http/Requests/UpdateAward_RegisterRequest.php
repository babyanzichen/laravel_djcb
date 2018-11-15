<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAward_RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('id');
        return [
            'companyname' => 'required', Rule::unique('award_register')->ignore($id),
            'phone' => 'alpha_dash|required', Rule::unique('award_register')->ignore($id),
        ];
    }
}
