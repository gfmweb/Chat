<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Chats\Infrastructure\Mappers;

readonly class ChatUserDTO
{
    public function __construct(
        public int $userId,
        public string $firstName,
        public string $lastName,
        public string $email
    ) {
    }
}