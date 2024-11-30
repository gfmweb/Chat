<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Messages\Presentation\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PostMessageRequest extends FormRequest
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
            'chatId' => 'required|numeric|min:1|exists:chats,id',
            'text' => 'required|string|min:1'
        ];
    }

    public function messages(): array
    {
        return [
            'chatId.required' => __('request.required'),
            'chatId.numeric' => __('request.numeric'),
            'chatId.min' => __('request.min'),
            'chatId.exists' => __('request.chat.exists'),
            'test.required' => __('request.required'),
            'text.string' => __('request.string'),
            'text.min' => __('request.min')
        ];
    }
}
