<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Messages\Actions;

use App\Modules\ChatGroup\Messages\Infrastructure\DTOs\ChatMessageDTO;
use App\Modules\ChatGroup\Messages\Infrastructure\Repositories\MessagesRepository;
use Illuminate\Support\Facades\Auth;

readonly class PostMessageAction
{
    public function __construct(
        private MessagesRepository $messagesRepository
    ) {
    }

    public function handle(int $chatId, string $message): ChatMessageDTO
    {
        return $this->messagesRepository->postMessage($chatId, $message, Auth::user()->id);
    }
}