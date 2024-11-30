<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Messages\Actions;

use App\Modules\ChatGroup\Messages\Infrastructure\DTOs\ChatMessagesResponseDTO;
use App\Modules\ChatGroup\Messages\Infrastructure\Repositories\MessagesRepository;
use Illuminate\Support\Facades\Auth;

readonly class GetMessagesAction
{
    public function __construct(
        private MessagesRepository $messagesRepository
    ) {
    }

    public function handle(int $chatId, ?int $page): ChatMessagesResponseDTO
    {
        $page = is_null($page) ? 0 : $page;
        $response = $this->messagesRepository->getMessages($chatId, Auth::user()->id, $page);
        $code = $response->count() > 0 ? 200 : 204;
        return new ChatMessagesResponseDTO($response, $code);
    }
}