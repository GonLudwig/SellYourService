<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePriceRequest extends FormRequest
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
            'name'          => 'required|max:50',
            'description'   => 'max:200',
            'price'         => 'required|decimal:2'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required'          => 'O campo :attribute é obrigatorio!',
            'name.max'          => 'O campo deve possuir no maximo 50 caracteres.',
            'description.max'   => 'O campo deve possuir no maximo 200 caracteres.',
            'price.decimal'     => 'O campo precisa possuir apenas duas casas decimais.'
        ];
    }
}
