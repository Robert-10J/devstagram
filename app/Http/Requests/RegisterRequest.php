<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:25', 'min:4'],
            'username' => ['required', 'string', 'max:20', 'unique:users'],
            'email'    => ['required', 'string', 'email', 'max:30', 'unique:users'],
            'password' => ['required','min:6', 'confirmed',
                PasswordRules::min(8)->letters()->numbers()->symbols()
            ],
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
{
    $response = response()->json([
        'errors' => $validator->errors()
    ], 422);

    throw new \Illuminate\Validation\ValidationException($validator, $response);
}
}
