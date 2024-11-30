<?php

declare(strict_types=1);

namespace App\Modules\Users\Login\Application\Actions;

use App\Modules\Users\Common\DTOs\TokenDTO;
use App\Modules\Users\Common\DTOs\UserDTO;
use App\Modules\Users\Login\Infrastructure\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

final readonly class LoginAction
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function handle(UserDTO $userDTO): TokenDTO
    {
        $candidate = $this->userRepository->getUserByEmail($userDTO->email);
        if (Hash::check($userDTO->getPassword(), $candidate->getPassword())) {
            $user = Auth::loginUsingId($candidate->id);
            $user->tokens()->delete();
            return new TokenDTO(
                    $user->createToken($candidate->email)->plainTextToken
            );
        }
        throw new BadRequestException(__('exceptions.wrongCredentials'), 422);
    }
}