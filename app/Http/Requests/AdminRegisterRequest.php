<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
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
            'login' => ['required', 'unique:admins', 'min:3'],
            'password' => ['required', /*'regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!?&#])[0-9a-zA-Z!?&#]{8,}$/',*/ 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'login.unique' => 'Аккаунт с таким login уже существует',
            'name.min' => 'min',

            'required' => 'Поле обязательно для заполнения',
            'regex' => 'Поле не соответствует шаблону',
            'confirmed' => 'Пароли не совпадают'
        ];
    }
}
