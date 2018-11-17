<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVoteInfoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('id');
        return [
            'name' => 'required', 
            'tips' => 'required',
            'rules'=>'required',
            'hold_time'=>'required',
            'time'=>'required',
            'address'=>'required',
            'is_enabled'=>'nullable'
        ];
    }
}
