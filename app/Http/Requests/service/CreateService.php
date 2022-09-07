<?php

namespace App\Http\Requests\service;

use Illuminate\Foundation\Http\FormRequest;

class CreateService extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'backImg' => 'nullable',
            'iconImg' => 'nullable',
            'title' => 'required',
            'description' => 'required',
        ];
    }
}
