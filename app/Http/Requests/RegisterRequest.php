<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'login'=>['required', 'string', Rule::unique(User::class, 'login')],
            'name'=>['required', 'string'],
            'email'=>['required', 'string', 'email', Rule::unique(User::class, 'email')],
            'password'=>['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    public function messages()
    {
        return [
            'password.min' => 'Пароль должно быть длинее 8 символов',
            'password.confirmed' => 'Пароли не совпадают',

            'email.required' => 'Укажите адрес электронной почты',

            'login.required' => 'Укажите логин'

        ];
    }
}
