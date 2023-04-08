<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Client_User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientUserController extends Controller
{

    public function client_team(Client $client) {

        $client_users = Client_User::with('roles')->get();

        return view('client.pages.info.team', compact('client_users', 'client'));
    }

    public function team_edit($id)
    {
        $client_id = Auth::user()->client_id();
        $client_users = Client_User::where('client_id', $client_id)->get();
        $client_user = Client_User::findOrFail($id);
        $roles = Role::all();

        return view('client.pages.info.team_edit', compact('client_user', 'client_users', 'roles'));
    }


    public function team_update(Request $request, $id)
    {
        $client_user = Client_User::findOrFail($id);

        $request->validate([
            'role_ids' => 'required|array',
            'role_ids.*' => 'exists:roles,id',
        ]);

        $role_ids = $request->input('role_ids');
        $client_user->roles()->sync($role_ids);

        return redirect()->route('client.team')->with('status', 'Team member has been updated!');
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
