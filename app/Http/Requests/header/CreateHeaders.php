<?php

namespace App\Http\Requests\header;

use Illuminate\Foundation\Http\FormRequest;

class CreateHeaders extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'image' => 'required',
            'title' => 'required',
            'welcomeMsg' => 'required',
            'description' => 'required',
            'linkName' => 'required',
            'linkUrl' => 'required',
            
        ];
    }
}
