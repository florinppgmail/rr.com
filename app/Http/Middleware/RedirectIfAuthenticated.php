<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    const ROLE_ADMIN = 1, ROLE_MEMBER = 2, ROLE_VENDOR = 3;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect($this->redirectTo());
        }

        return $next($request);
    }

    protected function redirectTo()
    {
        switch (Auth::user()->role_id){
            case self::ROLE_ADMIN:
                $path = '/admin';
                break;
            case self::ROLE_MEMBER:
                $path = '/member';
                break;
            case self::ROLE_VENDOR:
                $path = '/vendor';
                break;

        }

        return $path;
    }
}
