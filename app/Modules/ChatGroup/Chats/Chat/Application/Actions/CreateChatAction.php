<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Chats\Chat\Application\Actions;

use App\Modules\ChatGroup\Chats\Chat\Infrastructure\DTOs\CreateChatResponseDTO;
use App\Modules\ChatGroup\Chats\Chat\Infrastructure\Repositories\ChatRepository;
use App\Modules\ChatGroup\Chats\Chat\Infrastructure\Repositories\MessageRepository;
use App\Modules\ChatGroup\Chats\Chat\Infrastructure\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

readonly class CreateChatAction
{
    public function __construct(
        private ChatRepository $chatRepository,
        private UserRepository $userRepository,
        private MessageRepository $messageRepository
    ) {
    }

    public function handle(int $opponentId)
    {
        $opponent = $this->userRepository->getById($opponentId);
        $chatAlreadyExist = $this->checkIsChatAlreadyExists($opponent->chats, Auth::user()->chats);
        return !$chatAlreadyExist ? new CreateChatResponseDTO(
            $this->chatRepository->createChat(Auth::user()->id, $opponentId), 201
        ) : new CreateChatResponseDTO($chatAlreadyExist, 200);
    }

    private function checkIsChatAlreadyExists(
        Collection $opponentChatsCollection,
        Collection $userChatsCollection
    ): bool|int {
        $opponentChats = collect();
        foreach ($opponentChatsCollection as $chat) {
            $opponentChats->push($chat->id);
        }

        $userChats = collect();
        foreach ($userChatsCollection as $chat) {
            $userChats->push($chat->id);
        }

        foreach ($userChats as $chatId) {
            if ($opponentChats->contains($chatId)) {
                return $chatId;
            }
        }
        return false;
    }
}