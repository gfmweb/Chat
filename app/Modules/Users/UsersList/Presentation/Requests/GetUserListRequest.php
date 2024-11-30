<?php

declare(strict_types=1);

namespace App\Modules\Users\UsersList\Presentation\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GetUserListRequest extends FormRequest
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
            'position' => 'numeric|nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'position.numeric' => __('request.numeric')
        ];
    }
}
