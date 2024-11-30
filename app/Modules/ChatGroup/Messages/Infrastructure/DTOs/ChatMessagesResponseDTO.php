<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Messages\Infrastructure\DTOs;

use Illuminate\Support\Collection;

readonly class ChatMessagesResponseDTO
{
    public function __construct(
        public Collection $messages,
        public int $code
    ) {
    }
}