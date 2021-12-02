<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        $user = Auth::user();
        // dd($user);
        // $credentials = request()->only('email', 'password');
        if ($user->administrator) {
            // dd('$user->administrator',$user->administrator);
            Auth::guard('admin')->attempt(['email' => request()->email, 'password' => request()->password], request()->get('remember') == null ? false : true);
            session(["auth" => "admin"]);
            return route('admin.dashboard');
        } elseif ($user->client) {
            // dd('$user->client',$user->client);
            Auth::guard('client')->attempt(['email' => request()->email, 'password' => request()->password], request()->get('remember') == null ? false : true);
            session(["auth" => "client"]);
            return route('client.dashboard');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin,client')->except('logout');
    }
}
