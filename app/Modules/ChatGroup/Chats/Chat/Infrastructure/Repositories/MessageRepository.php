<?php

namespace App\Modules\ChatGroup\Chats\Chat\Infrastructure\Repositories;

use App\Models\Message;

 class MessageRepository
{
    public function __construct(
        private Message $messageModel
    ) {
    }

    public function getMessages(int $chatId, int $position)
    {

    }
}