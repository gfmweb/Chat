<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Messages\Actions;

use App\Modules\ChatGroup\Messages\Infrastructure\DTOs\ChatMessagesResponseDTO;
use App\Modules\ChatGroup\Messages\Infrastructure\Repositories\MessagesRepository;
use Illuminate\Support\Facades\Auth;

readonly class GetMessagesAction
{
    public function __construct(
        private MessagesRepository $messagesRepository
    ) {
    }

    public function handle(int $chatId, ?int $position): ChatMessagesResponseDTO
    {
        $position = is_null($position) ? 0 : $position;
        $response = $this->messagesRepository->getMessages($chatId, Auth::user()->id, $position);
        return $response->count() > 0 ? new ChatMessagesResponseDTO($response, 200) : new ChatMessagesResponseDTO(
            $response, 204
        );
    }
}