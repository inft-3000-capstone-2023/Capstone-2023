<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct(){
        $this->middleware('check.user.customer.loggedIn');
        $this->middleware('check.user.owns.review')->only(['update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Client $client)
    {
        if ($request->reviewTitle != null) {
            $request->validate([
                'reviewTitle' => ['max:255'],
                'rate' => ['required'], //rating is the only requirement
            ]);
        }else {
            $request->validate([
                'rate' => ['required'], //rating is the only requirement
            ]);
        }

        //creating review record
        Review::create([
            'client_customer_id' => Auth::user()->client_customers()->where('client_id', $client->id)->first()->id,
            'client_id' => $client->id,
            'title' => $request->reviewTitle,
            'description' => $request->reviewContent,
            'rating' => $request->rate,
        ]);

        //updating review fields of the client
        $client->total_number_reviews = $client->total_number_reviews + 1;
        $client->total_review_rating = $client->total_review_rating + $request->rate;
        $client->save();

        return redirect(route('reviews_page', $client->id))->with('status-review-added', 'Successfully created review.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client, Review $review)
    {
        if ($request->reviewTitle != null) {
            $request->validate([
                'reviewTitle' => ['max:255'],
                'rate' => ['required'], //rating is the only requirement
            ]);
        }else {
            $request->validate([
                'rate' => ['required'], //rating is the only requirement
            ]);
        }

        $oldRating = $review->rating;

        //updating review
        $review->title = $request->reviewTitle;
        $review->rating = $request->rate;
        $review->description = $request->reviewContent;
        $review->updated_at = Carbon::now();
        $review->save();

        //updating client review
        $client->total_review_rating = ($client->total_review_rating - $oldRating) + $request->rate;
        $client->save();

        return redirect(route('reviews_page', $client->id))->with('status-review-updated', 'Successfully updated your review.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, Review $review)
    {
        //updating review fields of the client
        $client->total_number_reviews = $client->total_number_reviews - 1;
        $client->total_review_rating = $client->total_review_rating - $review->rating;
        $client->save();

        //deleting record
        $review->delete();

        return redirect(route('reviews_page', $client->id))->with('status-review-updated', 'Successfully deleted your review.');
    }
}
