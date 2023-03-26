<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = Admin::orderBy('name', 'ASC')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
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
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect(route('list_users'))->with('status', 'Admin User created');
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
        $user = Admin::find($id);
        return redirect(route('list_users'), compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
        $user = Admin::find($id);
        return redirect(route('edit_user'), compact('user'));
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
        $user = Admin::find($id);

        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
        ]);

        $user->company_name = $request->name;
        $user->description = $request->email;
        $user->save();

        return redirect(route('list_users'))->with('status', 'Admin User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        $user = Admin::find($id);
        $user->delete();

        return redirect(route('list_users'))->with('status', 'Admin User has been deleted');
    }
}
