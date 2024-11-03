<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Illuminate\Http\Request;

class webAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (auth('user_web')->check()) {
            return $next($request);
        }
        return redirect(url('login'));
    }
}
