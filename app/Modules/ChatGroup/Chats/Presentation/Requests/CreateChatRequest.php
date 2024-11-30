<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Chats\Presentation\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateChatRequest extends FormRequest
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
            'userId' => 'required|numeric|exists:users,id',
        ];
    }

    public function messages():array
    {
        return [
            'userId.required' => __('request.required'),
            'userId.numeric' => __('request.numeric'),
            'userId.exists' => __('request.createChat.exists'),
        ];
    }
}
