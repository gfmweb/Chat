<?php

use App\Http\Middleware\ChatAccessMiddleware;
use App\Modules\ChatGroup\Chats\Presentation\Controllers\ChatController;
use App\Modules\ChatGroup\Messages\Presentation\Controllers\MessageController;
use App\Modules\Users\Login\Presentation\Controllers\LoginController;
use App\Modules\Users\Register\Presentation\Controllers\RegisterController;
use App\Modules\Users\UsersList\Presentation\Controllers\UsersListController;
use Illuminate\Support\Facades\Route;



Route::middleware('throttle:global')->group(function(){
    Route::prefix('v1')->group(function () {
        Route::post('login', [LoginController::class, 'login']);
        Route::post('register', [RegisterController::class, 'register']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::get('users', [UsersListController::class, 'list']);
            Route::get('chats', [ChatController::class, 'getChatList']);
            Route::post('chats', [ChatController::class, 'createChat']);
            Route::middleware(ChatAccessMiddleware::class)->group(function(){
                Route::get('messages', [MessageController::class, 'getMessages']);
                Route::post('messages', [MessageController::class, 'postMessage']);
                Route::get('message', [MessageController::class, 'getFullTextMessage']);
            });
        });
    });

});
