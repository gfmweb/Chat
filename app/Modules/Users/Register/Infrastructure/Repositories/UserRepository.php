<?php

declare(strict_types=1);

namespace App\Modules\Users\Register\Infrastructure\Repositories;

use App\Modules\Users\Common\DTOs\UserDTO;
use App\Modules\Users\Common\Mappers\UserMapper;
use App\Modules\Users\Common\Repositories\UserRepository as RepositoryCommon;

readonly class UserRepository extends RepositoryCommon
{
    public function create(UserDTO $newUser): UserDTO
    {
        return UserMapper::fromModel(
            $this->userModel->create(
                [
                    'email' => $newUser->email,
                    'password' => $newUser->getPassword(),
                    'nameFirst' => $newUser->firstName,
                    'nameLast' => $newUser->lastName,
                ]
            )
        );
    }
}