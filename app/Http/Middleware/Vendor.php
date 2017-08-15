<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Vendor
{
    const ROLE_VENDOR = 3;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role_id != self::ROLE_VENDOR){
            if($request->ajax())
                return response()->json(['error' => 'You are not authorized to use this resource.'], 401);

            return redirect('/login');
        }


        return $next($request);
    }
}
