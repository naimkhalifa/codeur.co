<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->type == 'admin') {
            return $next($request);
        }

        return redirect('/');
    }
}