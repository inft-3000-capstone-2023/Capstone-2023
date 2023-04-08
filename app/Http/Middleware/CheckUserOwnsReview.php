<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserOwnsReview
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
        $review = $request->review;

        //does the user own the review?
        if (Auth::user()->client_customers()->where('client_id', $request->client->id)->first()->id == $review->client_customer_id){
            //user owns the review
            return $next($request);
        } else{
            //user doesn't own the review
            return redirect()->back();
        }

    }
}
