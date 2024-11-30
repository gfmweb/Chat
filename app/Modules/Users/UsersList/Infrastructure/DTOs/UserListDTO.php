<?php

declare(strict_types=1);

namespace App\Modules\Users\UsersList\Infrastructure\DTOs;

readonly class UserListDTO
{
    public function __construct(
        public int $userId,
        public string $email,
        public string $firstName,
        public string $lastName
    ) {
    }
}