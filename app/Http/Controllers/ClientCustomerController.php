<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Client_Customer;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
     * Display a listing of the resource
     *  Jay - Index was being used, so I created this
     *
     * @return \Illuminate\Http\Response
     */
    public function list_client_customers(Request $request, Client $client)
    {
        //
        $searchTerm = $request->searchTerm;
//        dd($searchTerm);

        $client_customers = $client->customers()->get();

        foreach ($client_customers as $customer) {
            $customers[] = [
                'id' => $customer->user()->get()[0]->id,
                'name' => $customer->user()->get()[0]->name,
                'email' => $customer->user()->get()[0]->email,
            ];
        }

        $customers = collect($customers)
            ->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        if ($searchTerm != null) {
            $customers = $customers->filter(function($item) use ($searchTerm) {
                if (Str::contains($item['name'], $searchTerm)) {
                    return $item;
                }
            });
        }

        return view('client.pages.crm.index', compact('customers', 'client', 'searchTerm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Client $client
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        //
        return view('client.pages.crm.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Client  $client
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Client $client)
    {
        //
//        $request->validate([
//            'customer_name' => ['required'],
//            'customer_email' => ['required', 'unique:users,email'],
//        ]);
//
//        $user = User::create([
//            'name' => $request->customer_name,
//            'email' => $request->customer_email,
//            'type' => 0,
//             'password' => 'unsure',
//        ]);
//
//        Client_Customer::create([
//            'user_id' => $user->id,
//            'client_id' => $client->id,
//        ]);
//
//        return redirect()->back()->with('status', 'Client created');
    }

    /**
     * Display the specified resource.
     *
     * @param  Client  $client
     * @param  int  $customer_id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, Client_Customer $customer_id)
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
     * @param  int  $customer_id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $customer_id)
    {
        //
        $client_customer = Client_Customer::find($customer_id);
        $client_customer->delete();
        $client_customer->user()->delete();

        return redirect()->back()->with('status', 'Customer has been deleted');
    }
}
