<?php

namespace App\Http\Requests\aboutus;

use Illuminate\Foundation\Http\FormRequest;

class CreateAboutusFeatures extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'image' => 'nullable',
            'name' => 'required',
        ];
    }
}
 