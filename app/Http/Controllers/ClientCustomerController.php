<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Client_Customer;
use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('event_title')->get();
        return view('customer_views.customer_landing', compact(['events']));
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
