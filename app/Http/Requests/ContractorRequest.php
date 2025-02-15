<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'inn' => ['required', 'size:10', 'unique:contractors,inn'],
            'email' => ['required', 'email', 'max:255', 'unique:contractors,email'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Название контрагента" обязательно для заполнения.',
            'inn.required' => 'Поле "ИНН" обязательно для заполнения.',
            'inn.size' => 'ИНН должен быть ровно 10 символов.',
            'inn.unique' => 'Контрагент с таким ИНН уже существует.',
            'email.required' => 'Поле "Email" обязательно для заполнения.',
            'email.email' => 'Введите корректный email-адрес.',
            'email.unique' => 'Контрагент с таким email уже существует.',
        ];
    }

    public function authorize(): true
    {
        return true;
    }
}
