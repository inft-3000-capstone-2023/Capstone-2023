<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('main_landing.pages.index');
    }

    public function register(){
        return view('main_landing.pages.client_register');
    }

    public function login(){
        return view('main_landing.pages.client_login');
    }
}
