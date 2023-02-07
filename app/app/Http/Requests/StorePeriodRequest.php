<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeriodRequest extends FormRequest
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
            'started_at'    => 'required|date',
            'ended_at'      => 'required|date'
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
            'required'  => 'O campo :attribute é obrigatorio!',
            'date'      => 'O campo :attribute deve ser um campo de data valido. (Y-m-d h:m:s)',
            'name.max'  => 'O campo deve possuir no maximo 50 caracteres.',
        ];
    }
}
