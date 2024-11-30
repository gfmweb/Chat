<?php

declare(strict_types=1);

namespace App\Modules\Users\UsersList\Infrastructure\Repositories;

use App\Modules\Users\Common\Repositories\UserRepository as RepositoryCommon;
use Illuminate\Support\Collection;

readonly class UserRepository extends RepositoryCommon
{
    public function getUsersList(int $offset, int $limit): Collection
    {
        return $this->userModel::offset($offset)->limit($limit)->get();
    }
}