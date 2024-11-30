<?php

declare(strict_types=1);

namespace App\Modules\ChatGroup\Messages\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\ChatGroup\Messages\Actions\GetFullMessageTextAction;
use App\Modules\ChatGroup\Messages\Actions\GetMessagesAction;
use App\Modules\ChatGroup\Messages\Actions\PostMessageAction;
use App\Modules\ChatGroup\Messages\Presentation\Requests\GetFullTextMessageRequest;
use App\Modules\ChatGroup\Messages\Presentation\Requests\GetMessagesRequest;
use App\Modules\ChatGroup\Messages\Presentation\Requests\PostMessageRequest;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    public function postMessage(PostMessageRequest $request, PostMessageAction $action): JsonResponse
    {
        return response()->json(
            $action->handle(
                (int)$request->get('chatId'),
                $request->get('text')
            )
        );
    }

    public function getMessages(GetMessagesRequest $request, GetMessagesAction $action): JsonResponse
    {
        $result = $action->handle((int)$request->get('chatId'), (int)$request->get('page'));
        return response()->json($result->messages, $result->code);
    }

    public function getFullTextMessage(
        GetFullTextMessageRequest $request,
        GetFullMessageTextAction $action
    ): JsonResponse {
        return response()->json(
            $action->handle(
                (int)$request->get('chatId'),
                (int)$request->get('messageId')
            )
        );
    }
}
