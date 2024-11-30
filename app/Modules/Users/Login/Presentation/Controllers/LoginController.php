<?php

declare(strict_types=1);

namespace App\Modules\Users\Login\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\Common\Mappers\UserMapper;
use App\Modules\Users\Login\Application\Actions\LoginAction;
use App\Modules\Users\Login\Presentation\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;

final class LoginController extends Controller
{
    public function login(LoginRequest $request, LoginAction $action): JsonResponse
    {
        return response()->json($action->handle(UserMapper::fromRequest($request->all())));
    }
}
