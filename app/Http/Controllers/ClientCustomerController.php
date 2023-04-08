<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Client_Customer;
use App\Models\Event;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
     * @param  Client $client
     * @param  int  $customer_id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client, int $client_customer_id)
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
     * Display a listing of the resource
     *  Jay - Index was being used, so I created this
     *
     * @return \Illuminate\Http\Response
     */
    public function list_client_customers(Request $request, Client $client)
    {
        //
        $searchTerm = $request->searchTerm;

        $client_customers = $client->customers()->get();

        $customers = [];
        foreach ($client_customers as $customer) {
            $customers[] = $customer->user()->get()[0];
        }

        $customers = collect($customers)
            ->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        if ($searchTerm != null) {
            $customers = $customers->filter(function($item) use ($searchTerm) {
                if (Str::contains(strtolower($item['name']), strtolower($searchTerm))) {
                    return $item;
                }
            });
        }

        return view('client.pages.crm.index', compact( 'customers', 'client', 'searchTerm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client $client
     * @param  int  $user_id
     *
     * @return \Illuminate\Http\Response
     */
    public function customer_details(Client $client, int $user_id)
    {
        //
        $customer = User::find($user_id);
        return view('client.pages.crm.customer_details', compact('client', 'customer'));
    }
    public function customer_transactions(Request $request, Client $client, int $user_id)
    {
        //
        $searchTerm = $request->searchTerm;
        $customer = User::find($user_id);
        $client_customer = $customer->client_customers()->get()[0];
        $transactions = $client_customer->transactions()->get();

        $transactions = collect($transactions)
            ->sortBy('created_at', SORT_NATURAL|SORT_FLAG_CASE);

        if ($searchTerm != null) {
            $transactions = $transactions->filter(function($transaction) use ($searchTerm) {
                $associated_event = $transaction->event()->get()[0];
                if (Str::contains(strtolower($associated_event->event_title), strtolower($searchTerm))) {
                    return $transaction;
                }
            });
        }

        return view('client.pages.crm.customer_transactions', compact('client', 'customer', 'transactions', 'searchTerm'));
    }

    public function transaction_details(Client $client, int $customer_id, int $transaction_id) {
        $customer = User::find($customer_id);
        $transaction = Transaction::find($transaction_id);
        $associated_event = $transaction->event()->get()[0];

        return view('client.pages.crm.transaction_details', compact('client', 'customer', 'transaction', 'associated_event'));
    }

    public function customer_finances(Client $client, int $customer_id)
    {
        //
        $customer = User::find($customer_id);
        $client_customer = $customer->client_customers()->get()[0];
        $transactions = $client_customer->transactions()->get();

        // Following are the financial stats to display on customer finances page
        $num_purchases = 0;
        $amount_spent = 0;
        foreach($transactions as $transaction) {
            $num_purchases++;
            $amount_spent += $transaction->total;
        }
        if ($num_purchases > 0) { $avg_amount_spent = $amount_spent / $num_purchases; }
        else { $avg_amount_spent = 0; }

        return view('client.pages.crm.customer_finances',
            compact('client', 'customer', 'transactions',
            'num_purchases', 'amount_spent', 'avg_amount_spent'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @param  int $client_customer_id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, int $user_id)
    {
        //
        $user = User::find($user_id);
        $client_customers = $user->client_customers()->get();
        foreach ($client_customers as $client_customer) {
            if ($client_customer->client_id == $client->id) {
                $client_customer->delete();
            }
        }
        $user->delete();

        return redirect()->back()->with('status', 'Customer has been deleted');
    }
}
