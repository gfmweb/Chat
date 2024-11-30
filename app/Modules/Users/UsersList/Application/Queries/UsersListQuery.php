<?php

declare(strict_types=1);

namespace App\Modules\Users\UsersList\Application\Queries;

use App\Modules\Users\UsersList\Infrastructure\DTOs\UserListResponseDTO;
use App\Modules\Users\UsersList\Infrastructure\Mappers\UserListMapper;
use App\Modules\Users\UsersList\Infrastructure\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;


readonly class UsersListQuery
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function handle(?int $page): UserListResponseDTO
    {
        $page = (int)$page * config('listlimit.value');
        $limit = config('listlimit.value');
        $list = UserListMapper::fromCollection(
            $this->userRepository->getUsersList($page, $limit),
            Auth::user()->id
        );
        $code = $list->count() > 0 ? 200 : 204;
        return new UserListResponseDTO($list, $code);
    }
}