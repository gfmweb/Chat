<?php

declare(strict_types=1);

namespace App\Modules\Users\Register\Presentation\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:users|email',
            'firstName' => 'required|string|min:1|max:50',
            'lastName' => 'required|string|min:1|max:50',
            'password' => 'required|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('request.required'),
            'email.unique' => __('request.register.unique'),
            'email.email' => __('request.email'),
            'password.required' => __('request.required'),
            'password.confirmed' => __('request.confirmed'),
            'firstName.required' => __('request.required'),
            'firstName.string' => __('request.string'),
            'firstName.min' => __('request.register.name.min'),
            'firstName.max' => __('request.register.name.max'),
            'lastName.required' => __('request.register.name.required'),
            'lastName.string' => __('request.register.name.string'),
            'lastName.min' => __('request.register.name.min'),
            'lastName.max' => __('request.register.name.max'),
        ];
    }
}
