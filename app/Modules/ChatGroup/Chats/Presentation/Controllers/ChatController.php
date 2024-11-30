<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Chats\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\ChatGroup\Chats\Application\Actions\CreateChatAction;
use App\Modules\ChatGroup\Chats\Application\Queries\GetChatListQuery;
use App\Modules\ChatGroup\Chats\Presentation\Requests\CreateChatRequest;
use App\Modules\ChatGroup\Chats\Presentation\Requests\GetUsersChatListRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function getChatList(GetChatListQuery $chatListQuery, GetUsersChatListRequest $request): JsonResponse
    {
        $result = $chatListQuery->handle(Auth::user()->id, (int)$request->get('page'));
        return response()->json($result->chats, $result->code);
    }

    public function createChat(CreateChatRequest $request, CreateChatAction $action): JsonResponse
    {
        $result = $action->handle((int)$request->get('userId'));
        return response()->json(['chatId' => $result->chatId], $result->code);
    }
}
