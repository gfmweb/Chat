<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Chats\Chat\Application\Queries;

use App\Modules\ChatGroup\Chats\Chat\Infrastructure\Repositories\ChatRepository;
use App\Modules\ChatGroup\Chats\Chat\Infrastructure\Repositories\UserRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

readonly class GetChatListQuery
{
    public function __construct(
        private UserRepository $userRepository,
        private ChatRepository $chatRepository
    ) {
    }

    public function handle(int $userId, ?int $position = 0): Collection
    {
        $position = is_null($position) ? 0 : $position;
        return $this->chatRepository->getFullChatsInfo(
            self::getUsersChatsIds($this->userRepository->getUsersChat($userId)),
            Auth::id(), $position
        );
    }

    private function getUsersChatsIds(Collection $usersChats): Collection
    {
        $chatIds = collect();
        foreach ($usersChats as $chat) {
            $chatIds->push($chat->id);
        }
        return $chatIds;
    }
}