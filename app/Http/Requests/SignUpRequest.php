<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:40'],
            'phone_number' => ['required', 'starts_with:08'],
            'email' => ['required', 'email', 'ends_with:@gmail.com', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:12']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Please input your full name.",
            'email.required' =>  "Please input your email.",
            'password.required' =>  "Please input your password.",
            'phone_number' => "Please input your phone number."
        ];
    }
}
