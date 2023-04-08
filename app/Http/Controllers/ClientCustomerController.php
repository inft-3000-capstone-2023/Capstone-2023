<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Client_Customer;
use App\Models\Event;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ClientCustomerController extends Controller
{
    public function __construct(){
        $this->middleware('check.user.customer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('date_time', 'desc')->get();
        return view('customer.customer_client_views.landing', compact(['events']));
    }

    public function client_page(Client $client){
        $events = $client->events()->orderBy('date_time', 'asc')->paginate(20);
        return view('customer.customer_client_views.landing', compact(['events', 'client']));
    }

    public function bio_page(Client $client){
        return view('customer.customer_client_views.bio', compact(['client']));
    }

    public function reviews_page(Client $client){
        $reviews = $client->reviews()->orderBy('created_at', 'desc')->paginate(5);
        $total_rating = ceil($client->total_review_rating / $client->total_number_reviews);
        $canReview = true;
        $hasReview = false;
        $userReview = null;

        //figuring out if the user viewing the reviews page can leave a review
        //are they logged in?
        if (!Auth::user()){
            //not logged in, can't leave a review
            $canReview = false;
        } else {
            //are they a current customer of the client?
            if (count(Auth::user()->client_customers()->where('client_id', $client->id)->get()) == 0){
                //they are not a current customer of the client
                $canReview = false;
            } else {//they are a current customer
                //do they already have a review?
                $userReview = Auth::user()->client_customers()->where('client_id', $client->id)->first()->reviews()->where('client_id', $client->id)->first();
                if ($userReview != null){
                    //have a review
                    $canReview = false;
                    $hasReview = true;
                }
            }
        }

        return view('customer.customer_client_views.reviews', compact(['reviews', 'client', 'total_rating', 'canReview', 'hasReview', 'userReview']));
    }

    public function view_event_page(Client $client, Event $event){
        return view('customer.customer_client_views.view_event', compact(['client', 'event']));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client_Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Client_Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client_Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Client_Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client_Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client_Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client_Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client_Customer $customer)
    {
        //
    }
}
