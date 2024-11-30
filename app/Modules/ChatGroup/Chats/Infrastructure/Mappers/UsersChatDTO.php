<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Chats\Infrastructure\Mappers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

readonly class UsersChatDTO
{
    public function __construct(
        public int $chatId,
        public string $chatName,
        public Carbon $timestamp,
        public Collection $users
    ) {
    }
}