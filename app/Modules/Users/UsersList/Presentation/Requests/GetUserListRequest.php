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
            'page' => 'numeric|min:0|nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'page.numeric' => __('request.numeric'),
            'page.min' => __('request.min')
        ];
    }
}
