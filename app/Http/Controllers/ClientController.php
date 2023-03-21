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
        return view('admin.index', compact(['clients']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
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
            'company_name' => ['required','unique:clients,company_name'],
            'description' => ['required'],
        ]);

        Client::create([
            'company_name' => $request->company_name,
            'description' => $request->description,
        ]);

        return redirect(route('admin.index'))->with('status', 'Client created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $client = Client::find($id);
        return view('admin.show', compact(['client']));
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
        $client = Client::find($id);
        return view('admin.edit', compact(['client']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
        $client = Client::find($id);

        $request->validate([
            'company_name' => ['required','unique:clients,company_name,'.$client->id],
            'description' => ['required'],
        ]);

        $client->company_name = $request->company_name;
        $client->description = $request->description;
        $client->save();

        return redirect(route('admin.index'))->with('status', 'Client has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        $client = Client::find($id);

        $client->delete();

        return redirect(route('admin.index'))->with('status', 'Client has been deleted');
    }

}
