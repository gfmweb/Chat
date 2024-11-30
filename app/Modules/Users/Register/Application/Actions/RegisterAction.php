<?php

declare(strict_types=1);

namespace App\Modules\Users\Register\Application\Actions;

use App\Modules\Users\Common\DTOs\TokenDTO;
use App\Modules\Users\Common\DTOs\UserDTO;
use App\Modules\Users\Register\Infrastructure\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

final readonly class RegisterAction
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function handle(UserDTO $newUser): TokenDTO
    {
        $entity = new UserEntity($this->userRepository->create($newUser));
        return new TokenDTO(
            Auth::loginUsingId($entity->user->id)->createToken($entity->user->email)->plainTextToken
        );
    }
}