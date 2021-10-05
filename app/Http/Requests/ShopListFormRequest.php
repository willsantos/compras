<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopListFormRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|min:3'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Não podemos criar uma lista sem nome',
            'name.min' => 'A nome da lista precisa ter ao menos 3 caracteres',
        ];

    }
}
