<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Client_Customer;
use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ClientCustomerController extends Controller
{
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
        $reviews = $client->reviews()->paginate(5);
        $total_rating = $client->total_review_rating / $client->total_number_reviews;
        return view('customer.customer_client_views.reviews', compact(['reviews', 'client', 'total_rating']));
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
