<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Messages\Presentation\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'chatId' => 'required|numeric|exists:chats,id',
            'messageId' => 'required|numeric|min:0|exists:messages,id'
        ];
    }
}