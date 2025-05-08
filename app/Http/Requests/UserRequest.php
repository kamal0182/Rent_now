<?php

namespace App\Http\Requests;

use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname'=>'required|string',
            'lastname' =>'required|string',
            'email'  => 'required|email|unique:users,email',
            'password'  => 'required|string|min:8|confirmed',
            'phone' => 'required|regex:/^\+?[0-9]{10,15}$/|unique:phones,number',
            // 'role_name' => 'required|exists:roles,name',
            'confirmed' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
                'role_name.exists' => 'The selected role does not exist. Please choose a valid role.',
        ];
    }
}
