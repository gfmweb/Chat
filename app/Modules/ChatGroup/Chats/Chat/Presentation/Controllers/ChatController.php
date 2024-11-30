<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Chats\Chat\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\ChatGroup\Chats\Chat\Application\Actions\CreateChatAction;
use App\Modules\ChatGroup\Chats\Chat\Application\Queries\GetChatListQuery;
use App\Modules\ChatGroup\Chats\Chat\Presentation\Requests\CreateChatRequest;
use App\Modules\ChatGroup\Chats\Chat\Presentation\Requests\GetUsersChatListRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function getChatList(GetChatListQuery $chatListQuery, GetUsersChatListRequest $request): JsonResponse
    {
        return response()->json($chatListQuery->handle(Auth::user()->id, (int)$request->get('position')));
    }

    public function createChat(CreateChatRequest $request, CreateChatAction $action): JsonResponse
    {
        $result = $action->handle((int)$request->get('userId'));
        return response()->json(['chatId' => $result->chatId], $result->code);
    }
}
