<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Chats\Infrastructure\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

readonly class UserRepository
{
    public function __construct(
        private User $userModel
    ) {
    }

    public function getUsersChat(int $userId): Collection
    {
        return $this->userModel->find($userId)->load(['chats'])->chats;
    }

    public function getById(int $id): User
    {
        return $this->userModel->find($id)->load('chats');
    }
}