<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // TODO - soft delete everything

        $client = Client::find($id);
        $reviews = $client->reviews()->get();
        $tokens = $client->tokens()->get();
        $clientUsers = $client->clientUsers()->get();

        $client->delete();

        return redirect()->back()->with('status', 'Client has been deleted');
    }

    /**
     * Direct Client User to Client Dashboard
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function display_dashboard(Client $client)
    {
        return view('client.pages.dashboard', compact('client'));
    }

    /*
     * for client organization info profile page
     *
     */

    public function client_organizer() {
        // Get the client_id from the authenticated user
        $client_id = Auth::user()->client_id();

        // Find the client using the client_id
        $client = Client::find($client_id);

        return view('client.pages.info.organizer', compact('client'));
    }


    public function edit_profile() {
        // Get the client_id from the authenticated user
        $client_id = Auth::user()->client_id();

        // Find the client using the client_id
        $client = Client::find($client_id);
        return view('client.client_organizer', compact('client'));
    }
    public function update_profile(Request $request)
    {
        // Get the client_id from the authenticated user
        $client_id = Auth::user()->client_id();

        $client = Client::find($client_id);

        // Validate the request data, including the uploaded file
        $validatedData = $request->validate([
            'company_name' => 'required',
            'description' => 'required',
            'logo_path' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Update the client data
        $client->company_name = $request->input('company_name');
        $client->description = $request->input('description');

        // Check if a new logo file has been uploaded
        if ($request->hasFile('logo_path')) {
            // Store the uploaded file
            $file = $request->file('logo_path');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/uploads', $fileName);

            // Update the client's logo_path
            $client->logo_path = 'storage/uploads/' . $fileName;
        }

        // Save the client
        $client->save();

        return redirect()->route('client.client_organizer',  ['client' => $client])->with('status', 'Organizer profile has been updated!');
    }


    public function invite_team_member(Request $request, Client $client) {

    }
}
