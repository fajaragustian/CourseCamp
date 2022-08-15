<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Member
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth::check() && Auth::user()->userRole->role_id  == 3) {
            return $next($request);
        } else if (auth::check() && Auth::user()->userRole->role_id  == 1) {
            return $next($request);
        } else {
            abort(403, 'Your Access Forbidden');
        }
    }
}
