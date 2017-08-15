<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    const ROLE_ADMIN = 1, ROLE_MEMBER = 2, ROLE_VENDOR = 3;

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
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
