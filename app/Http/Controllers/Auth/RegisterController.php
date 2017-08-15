<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Events\MemberRegistered;
use App\Events\VendorRegistered;


class RegisterController extends Controller
{
    const ROLE_ADMIN = 1, ROLE_MEMBER = 2, ROLE_VENDOR = 3;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|integer|in:2,3',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => (isset($data['name']) && strlen($data['name'])) ? $data['name'] : '',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $data['role_id'],
        ]);
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

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->createUserProfile($user);

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function createUserProfile($user)
    {
        if($user->role_id == self::ROLE_MEMBER){
            event(new MemberRegistered($user));
        } elseif($user->role_id == self::ROLE_VENDOR){
            event(new VendorRegistered($user));
        }
    }
}
