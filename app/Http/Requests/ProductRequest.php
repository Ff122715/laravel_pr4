<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'price' => ['required', 'numeric'],
            'count' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'numeric' => 'Необходимо ввести числовое значение',
            'min' => 'Минимальная длина поля :attribute: :min'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Наименование'
        ];
    }
}
