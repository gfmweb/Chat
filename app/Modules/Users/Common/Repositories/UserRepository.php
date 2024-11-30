<?php

declare(strict_types=1);

namespace App\Modules\Users\Common\Repositories;

use App\Models\User;
use App\Modules\Users\Common\DTOs\UserDTO;
use App\Modules\Users\Common\Mappers\UserMapper;
use Illuminate\Support\Collection;

abstract readonly class UserRepository
{
    public function __construct(
        protected User $userModel
    ) {
    }


}