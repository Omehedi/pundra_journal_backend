<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Illuminate\Http\Request;

class webAuthGuest
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth('user_web')->guest()) {
            return redirect(url('auth/profile'));
        }
        return $next($request);
    }
}
