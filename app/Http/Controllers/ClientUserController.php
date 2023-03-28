<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Client_User;
use Illuminate\Http\Request;

class ClientUserController extends Controller
{

    public function client_team(Client $client) {

        $client_users = Client_User::with('roles')->get();

        return view('client.pages.info.team', compact('client_users', 'client'));
    }

    public function team_edit($id)
    {
        // Fetch all available roles
        $client_user = Client_User::findOrFail($id);

        // Return the edit view with the client_user and roles
        return view('client.pages.info.team_edit', compact('client_user'));
    }

    public function team_update(Request $request, Client_User $client_User) {
        $request->validate([
            'role_ids'=>['required']
        ]);
        $role_ids = request()->input('role_ids');
        $client_User->roles()->sync($request->$role_ids);

        return redirect(route('client.team'))->with('status', 'Team member has been updated!');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client_User  $client_user
     * @return \Illuminate\Http\Response
     */
    public function show(Client_User $client_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client_User  $client_user
     * @return \Illuminate\Http\Response
     */
    public function edit(Client_User $client_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client_User  $client_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client_User $client_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client_User  $client_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client_User $client_user)
    {
        //
    }
}
