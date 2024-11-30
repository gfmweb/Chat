<?php

declare(strict_types=1);

namespace App\Modules\Users\UsersList\Infrastructure\DTOs;

use Illuminate\Support\Collection;

readonly class UserListResponseDTO
{
    public function __construct(
        public Collection $users,
        public int $code
    ) {
    }
}