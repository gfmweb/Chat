<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Messages\Infrastructure\Mappers;

use App\Models\Message;
use App\Modules\ChatGroup\Messages\Infrastructure\DTOs\ChatMessageDTO;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class MessagesMapper
{
    public static function fromCollection(Collection $collection, int $userId): Collection
    {
        $resultCollection = collect();
        foreach ($collection as $item) {
            $resultCollection->push(self::fromModel($item, $userId));
        }
        return $resultCollection;
    }

    public static function fromModel(Message $message, int $userId, bool $fulltext = false): ChatMessageDTO
    {
        $text = $message->message;
        return (!$fulltext) ? new ChatMessageDTO(
            $message->id,
            $message->chat_id,
            $message->from,
            self::cropMessage($text),
            $message->created_at,
            self::hasFullText($text),
            self::isIAuthor($message->from, $userId)
        ) : new ChatMessageDTO(
            $message->id,
            $message->chat_id,
            $message->from,
            $text,
            $message->created_at,
            false,
            self::isIAuthor($message->from, $userId)
        );
    }

    private static function cropMessage(string $message): string
    {
        return Str::limit($message);
    }

    private static function hasFullText(string $message): bool
    {
        return strlen($message) > 100;
    }

    private static function isIAuthor(int $messageId, int $userId): bool
    {
        return $messageId === $userId;
    }
}