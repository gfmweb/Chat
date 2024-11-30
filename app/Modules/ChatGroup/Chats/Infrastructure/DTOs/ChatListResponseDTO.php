<?php

namespace App\Modules\ChatGroup\Chats\Infrastructure\DTOs;

use Illuminate\Support\Collection;

readonly class ChatListResponseDTO
{
    public function __construct(
        public Collection $chats,
        public int $code
    ) {
    }
}