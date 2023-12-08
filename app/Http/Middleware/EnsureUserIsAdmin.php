<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            // Перенаправление неавторизованного пользователя
            #return redirect('home');
            dd('Вы не админ');
        }

        return $next($request);
    }

}
