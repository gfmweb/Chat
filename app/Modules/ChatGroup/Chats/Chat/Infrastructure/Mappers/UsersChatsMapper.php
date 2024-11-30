<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Chats\Chat\Infrastructure\Mappers;

use App\Models\Chat;
use Illuminate\Support\Collection;

readonly class UsersChatsMapper
{
    public static function fromModel(Chat $chat, int $userId): UsersChatDTO
    {
        return new UsersChatDTO(
          $chat->id,
          self::getChatName($chat->users, $userId),
          $chat->updated_at,
          self::mapChatUsers($chat->users, $userId)
        );
    }

    /**
     * @param Collection<Chat> $collection
     * @return Collection<UsersChatDTO>
     */
    public static function fromCollection(Collection $collection, int $userId): Collection
    {
        $resultCollection = collect();
        foreach ($collection as $item) {
            $resultCollection->push(self::fromModel($item, $userId));
        }
        return $resultCollection;
    }

    private static function getChatName(Collection $users, int $userId): string
    {
        foreach ($users as $user) {
            if($user->id !== $userId) {
                return $user->nameFirst . ' ' . $user->nameLast;
            }
        }
        return 'Избранное';
    }

    private static function mapChatUsers(Collection $users, int $userId): Collection
    {
        $resultCollection = collect();
        foreach ($users as $user) {
            $resultCollection->push(new ChatUserDTO(
                $user->id,
                $user->nameFirst,
                $user->nameLast,
                $user->email
            ));
        }
        return $resultCollection;
    }
}