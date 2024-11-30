<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Chats\Chat\Infrastructure\Repositories;

use App\Models\Chat;
use App\Modules\ChatGroup\Chats\Chat\Infrastructure\Mappers\UsersChatsMapper;
use Illuminate\Support\Collection;

readonly class ChatRepository
{
    public function __construct(
        private Chat $chatModel
    ) {
    }

    public function createChat(int $ownerId, int $opponentId): int
    {
        $chat = $this->chatModel->create([]);
        $chat->users()->attach([$ownerId, $opponentId]);
        return $chat->id;
    }

    public function getFullChatsInfo(Collection $ids, int $userId, ?int $position = 0): Collection
    {
        return UsersChatsMapper::fromCollection(
            $this->chatModel->whereIn('id', $ids)
                ->offset($position * config('listlimit.value'))
                ->limit(config('listlimit.value'))
                ->orderBy('updated_at', 'DESC')
                ->get()
                ->load('users'),
            $userId
        );
    }
}