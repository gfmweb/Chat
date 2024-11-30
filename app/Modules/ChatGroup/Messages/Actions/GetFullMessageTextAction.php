<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Messages\Actions;

use App\Modules\ChatGroup\Messages\Infrastructure\DTOs\ChatMessageDTO;
use App\Modules\ChatGroup\Messages\Infrastructure\Repositories\MessagesRepository;
use Illuminate\Support\Facades\Auth;

readonly class GetFullMessageTextAction
{
    public function __construct(
        private MessagesRepository $messagesRepository
    ){
    }

    public function handle(int $chatId, int $messageId):ChatMessageDTO
    {
        return $this->messagesRepository->getFullTextMessage($chatId, $messageId, Auth::user()->id);
    }
}