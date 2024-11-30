<?php

declare(strict_types=1);

namespace App\Modules\Users\Register\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\Common\Mappers\UserMapper;
use App\Modules\Users\Register\Application\Actions\RegisterAction;
use App\Modules\Users\Register\Presentation\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;

final class RegisterController extends Controller
{
    public function register(RegisterRequest $request, RegisterAction $action): JsonResponse
    {
        return response()->json($action->handle(UserMapper::fromRequest($request->all())), 201);
    }
}
