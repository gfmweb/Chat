<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Chats\Application\Queries;

use App\Modules\ChatGroup\Chats\Infrastructure\DTOs\ChatListResponseDTO;
use App\Modules\ChatGroup\Chats\Infrastructure\Repositories\ChatRepository;
use App\Modules\ChatGroup\Chats\Infrastructure\Repositories\UserRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

readonly class GetChatListQuery
{
    public function __construct(
        private UserRepository $userRepository,
        private ChatRepository $chatRepository
    ) {
    }

    public function handle(int $userId, ?int $page = 0): ChatListResponseDTO
    {
        $page = is_null($page) ? 0 : $page;
        $result = $this->chatRepository->getFullChatsInfo(
            self::getUsersChatsIds($this->userRepository->getUsersChat($userId)),
            Auth::id(), $page
        );
        $code = $result->count() > 0 ? 200 : 204;
        return new ChatListResponseDTO($result, $code);
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