<?php

declare(strict_types=1);

namespace App\Modules\Users\UsersList\Infrastructure\Mappers;

use App\Models\User;
use App\Modules\Users\UsersList\Infrastructure\DTOs\UserListDTO;
use Illuminate\Support\Collection;

class UserListMapper
{
    /**
     * @param Collection<User> $collection
     * @param int|null $userId
     * @return Collection<UserListDTO>
     */
    public static function fromCollection(Collection $collection, ?int $userId = 0): Collection
    {
        $list = collect();
        if (is_null($userId)) {
            $userId = 0;
        }

        foreach ($collection as $item) {
            if ($item->id == $userId) {
                $item->nameFirst = 'Избранное';
                $item->nameLast = '';
            }
            $list->push(self::fromModel($item));
        }
        return $list;
    }

    public static function fromModel(User $user): UserListDTO
    {
        return new UserListDTO(
            $user->id,
            $user->email,
            $user->nameFirst,
            $user->nameLast
        );
    }
}