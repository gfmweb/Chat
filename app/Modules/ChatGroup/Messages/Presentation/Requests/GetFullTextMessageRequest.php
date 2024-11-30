<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Messages\Presentation\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GetFullTextMessageRequest extends FormRequest
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
            'chatId' => 'required|numeric|exists:chats,id',
            'messageId' => 'required|numeric|min:0|exists:messages,id'
        ];
    }

    public function messages(): array
    {
        return [
            'chatId.required' => __('request.required'),
            'chatId.numeric' => __('request.numeric'),
            'chatId.exists' => __('request.chat.exists'),
            'messageId.required' => __('request.required'),
            'messageId.numeric' => __('request.numeric'),
            'messageId.min' => __('request.min'),
            'messageId.exists' => __('request.message.exists'),
        ];
    }
}
