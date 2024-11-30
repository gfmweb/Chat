<?php

declare(strict_types=1);

namespace App\Modules\Users\Common\Mappers;

use App\Models\User;
use App\Modules\Users\Common\DTOs\UserDTO;
use Illuminate\Support\Collection;

class UserMapper
{
    public static function fromModel(User $user): UserDTO
    {
        return new UserDTO(
            $user->email,
            $user->password,
            $user->nameFirst,
            $user->nameLast,
            $user->id
        );
    }

    public static function fromRequest(array $data): UserDTO
    {
        return new UserDTO(
            $data['email'],
            $data['password'],
            $data['firstName'] ?? null,
            $data['lastName'] ?? null,
            null
        );
    }
}