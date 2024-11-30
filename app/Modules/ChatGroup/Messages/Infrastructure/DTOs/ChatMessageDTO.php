<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Messages\Infrastructure\DTOs;

use Illuminate\Support\Carbon;

readonly class ChatMessageDTO
{
    public function __construct(
        public int $messageId,
        public int $chatId,
        public int $senderId,
        public string $text,
        public Carbon $timestamp,
        public bool $hasFulltext,
        public bool $isIAuthor
    ) {
    }
}