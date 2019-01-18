<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserIsActive
{
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->is_active) {
            Auth::logout();

            return redirect('/')
                ->with('message', 'Account not active.');
        }

        return $next($request);
    }
}
