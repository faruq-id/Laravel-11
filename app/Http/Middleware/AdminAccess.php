<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
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
            return redirect('/dashboard')->with('error', 'Access denied! Admins only.');
        } else {
            return redirect('/login')->with('error', 'Access denied! Admins only.');
        }
    }
}
