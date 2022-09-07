<?php

namespace App\Http\Requests\clients;

use Illuminate\Foundation\Http\FormRequest;

class CreateClients extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'image' => 'required',
        ];
    }
}
