<?php

declare(strict_types=1);

namespace App\Modules\Users\UsersList\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\UsersList\Application\Queries\UsersListQuery;
use App\Modules\Users\UsersList\Presentation\Requests\GetUserListRequest;
use Illuminate\Http\JsonResponse;

class UsersListController extends Controller
{
    public function list(GetUserListRequest $request, UsersListQuery $listQuery): JsonResponse
    {
        $result = $listQuery->handle( (int) $request->get('position'));
        return response()->json($result->users, $result->code);
    }
}
