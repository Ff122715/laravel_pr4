<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'min:2', /*'regex:/^[а-яё\s\-]+$/iu'*/],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!?&#])[0-9a-zA-Z!?&#]{8,}$/', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Аккаунт с таким email уже существует',
            'name.min' => 'min',

            'required' => 'Поле обязательно для заполнения',
            'regex' => 'Поле не соответствует шаблону',
            'email' => '":attribute" введен некорректно',
            'confirmed' => 'Пароли не совпадают'
        ];
    }
}
