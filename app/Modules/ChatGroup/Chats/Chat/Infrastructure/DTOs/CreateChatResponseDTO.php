<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Chats\Chat\Infrastructure\DTOs;

readonly class CreateChatResponseDTO
{
    public function __construct(
      public int $chatId,
      public int $code
    ) {
    }
}