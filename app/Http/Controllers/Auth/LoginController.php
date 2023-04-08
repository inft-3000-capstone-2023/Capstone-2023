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
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //redirecting to user type specific pages
    public function redirectTo() {
        if (Auth::user()->type == 0){ //type 0 is admin
            return route('admin.clients.index');
        } else if (Auth::user()->type == 1) { //type 1 is client user
            $client_id = Auth::user()->client_id();
            return route('client.dashboard', $client_id);
        } else{ //a customer is logged in, send them to their customer homepage
            return route('home');
        }
    }
}
