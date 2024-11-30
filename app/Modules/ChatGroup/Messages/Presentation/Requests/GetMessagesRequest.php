<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Messages\Presentation\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GetMessagesRequest extends FormRequest
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
            'chatId' => 'required|exists:chats,id',
            'page' => 'numeric|min:0|nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'chatId.required' => __('request.required'),
            'chatId.exists' => __('request.chat.exists'),
            'page.numeric' => __('request.numeric'),
            'page.min' => __('request.min')
        ];
    }
}
