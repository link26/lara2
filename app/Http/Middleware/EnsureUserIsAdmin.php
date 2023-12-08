<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            // Возвращаем объект ответа
            return response()->view('auth.not_admin');
        }

        return $next($request);
    }
}

