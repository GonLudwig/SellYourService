<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'period_id' => 'required|exists:periods,id',
            'client_id' => 'required|exists:clients,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'confirmation' => 'required|boolean'
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
            'required' => 'O campo :attribute é obrigatorio!',
            'date' => 'O campo :attribute deve ser um campo de data valido. (Y-m-d h:m:s)',
            'confirmation.boolean' => 'O campo precisa ser um valor boolean',
            'product_id.exists' => 'O produto não existe.',
            'period_id.exists' => 'O periodo não existe.',
            'client_id.exists' => 'O cliente não existe.',
        ];
    }
}
