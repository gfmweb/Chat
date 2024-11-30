<?php

declare(strict_types=1);

namespace App\Modules\Users\Common\DTOs;

readonly class UserDTO
{
    public function __construct(
        public string $email,
        private ?string $password,
        public ?string $firstName,
        public ?string $lastName,
        public ?int $id
    ) {
    }

    public function getPassword(): string
    {
        return $this->password;
    }

}