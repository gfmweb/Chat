<?php

namespace App\Http\Middleware;

use App\Models\Chat;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ChatAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $canAccess =  DB::table('chat_user')
            ->where(['chat_id' => $request->get('chat'), 'user_id' => Auth::user()->id ?? null])
            ->exists();

        return ($canAccess) ? $next($request) : throw new HttpException(403,'Forbidden');
    }
}