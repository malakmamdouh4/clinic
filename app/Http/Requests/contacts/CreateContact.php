<?php

namespace App\Http\Requests\contacts;

use Illuminate\Foundation\Http\FormRequest;

class CreateContact extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'email' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ];
    }
}
