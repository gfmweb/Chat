<?php

declare(strict_types=1);

namespace App\Modules\Users\Login\Infrastructure\Repositories;

use App\Modules\Users\Common\DTOs\UserDTO;
use App\Modules\Users\Common\Mappers\UserMapper;
use App\Modules\Users\Common\Repositories\UserRepository as RepositoryCommon;

readonly class UserRepository extends RepositoryCommon
{
    public function getUserByEmail(string $email): UserDTO
    {
        return UserMapper::fromModel
        (
            $this->userModel::where('email', '=', $email)->firstOrFail()
        );
    }
}