<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin == 1) {
            return $next($request);
        }

        if (Auth::check()) {
            return redirect('/dashboard')->with('error', 'Access denied! You do not have access to this page.');
        } else {
            return redirect()->route('auth.login')->with('error', 'Access denied! You do not have access to this page.');
        }
    }
}
