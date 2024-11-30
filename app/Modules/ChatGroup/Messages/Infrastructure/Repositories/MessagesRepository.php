<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Messages\Infrastructure\Repositories;

use App\Models\Message;
use App\Modules\ChatGroup\Messages\Infrastructure\DTOs\ChatMessageDTO;
use App\Modules\ChatGroup\Messages\Infrastructure\Mappers\MessagesMapper;
use Illuminate\Support\Collection;

readonly class MessagesRepository
{
    public function __construct(
        private Message $messageModel
    ) {
    }

    public function getMessages(int $chatId, int $userId, ?int $position = 0): ?Collection
    {
        return MessagesMapper::fromCollection(
            $this->messageModel::where('chat_id', $chatId)
                ->offset($position * config('listlimit.value'))
                ->limit(config('listlimit.value'))
                ->orderBy('id', 'DESC')
                ->get(),
            $userId
        );
    }

    public function getFullTextMessage(int $chatId, int $messageId, int $userId): ChatMessageDTO
    {
        return MessagesMapper::fromModel(
            $this->messageModel::where([['chat_id', $chatId], ['id', $messageId]])->firstOrFail(),
            $userId,
            true
        );
    }

    public function postMessage(int $chatId, string $message, int $userId): ChatMessageDTO
    {
        return MessagesMapper::fromModel(
            $this->messageModel->create([
                'from' => $userId,
                'message' => $message,
                'chat_id' => $chatId
            ]),
            $userId
        );
    }
}