<?php

declare(strict_types=1);

namespace App\Modules\Users\Common\DTOs;

readonly class TokenDTO
{
    public function __construct(
        public string $token,
        public string $tokenType = 'BearerToken',
    ) {
    }
}