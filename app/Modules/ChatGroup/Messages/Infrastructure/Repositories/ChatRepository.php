<?php

namespace App\Modules\ChatGroup\Messages\Infrastructure\Repositories;

use App\Models\Chat;
use Illuminate\Support\Carbon;

readonly class ChatRepository
{
    public function __construct(
        private Chat $chatModel
    ) {
    }

    public function updateChat(int $chatId, Carbon $time)
    {
        $this->chatModel::where('id', $chatId)->update(['updated_at' => $time]);
    }
}