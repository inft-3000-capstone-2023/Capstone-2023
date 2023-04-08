<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserIsCustomerAndLoggedIn
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
        //is the user logged in?
        if (Auth::check()){
            //user is logged in
            if (count(Auth::user()->client_customers()->where('client_id', $request->client->id)->get()) == 0){
                //user is not a current customer of the client
                return redirect()->back();
            } else {
                //user is a current customer of the client
                return $next($request);
            }
        }

        return redirect()->back();
    }
}
