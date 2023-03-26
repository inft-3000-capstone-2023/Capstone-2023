<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::orderBy('company_name', 'ASC')->get();
        return view('admin.clients.index', compact(['clients']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        return view('admin.clients.create');
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
//        $request->validate([
//            'company_name' => ['required','unique:clients,company_name'],
//            'description' => ['required'],
//            'logo_path' => ['required','url'],
//        ]);
//
//        Client::create([
//            'company_name' => $request->company_name,
//            'description' => $request->description,
//            'logo_path' => $request->logo_path,
//        ]);
//
//        return redirect(route('list_clients'))->with('status', 'Client created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        $client = Client::find($id);
        $events = $client->events()->get();
        $client_users = $client->clientUsers()->get();

        return view('admin.clients.show', compact(['client', 'events', 'client_users']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
//        $client = Client::find($id);
//        return view('admin.clients.edit', compact(['client']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
//        $client = Client::find($id);
//
//        $request->validate([
//            'company_name' => ['required','unique:clients,company_name,'.$client->id],
//            'description' => ['required'],
//            'logo_path' => ['required','url'],
//        ]);
//
//        $client->company_name = $request->company_name;
//        $client->description = $request->description;
//        $client->logo_path = $request->logo_path;
//        $client->save();
//
//        return redirect(route('list_clients'))->with('status', 'Client has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        // TODO - Jay - Fully delete all things connected to client
        //  reviews, tokens, client_users
        //  client_customers (Note - don't delete customer records themselves)
        //  (I guess don't delete event records, or transaction records, need to confirm)

        $client = Client::find($id);
        $reviews = $client->reviews()->get();
        $tokens = $client->tokens()->get();
        $clientUsers = $client->clientUsers()->get();

        $client->delete();

        return redirect()->back()->with('status', 'Client has been deleted');
    }

}
