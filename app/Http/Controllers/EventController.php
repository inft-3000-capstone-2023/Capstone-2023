<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function client_events($client_id) {
        // Find the client using the client_id
        $client = Client::find($client_id);

        $bookings = array();
        $events = $client->events;

        foreach ($events as $event) {
            $bookings[] = [
                'title' => $event->event_title,
                'start' => $event->date_time,
                // If you have an 'end_time' property, add it here
                'end' => $event->end_time
            ];
        }

        // Fetch the 5 most recent events
        $recentEvents = $client->events()->latest('created_at')->take(5)->get();

        // Map the recent events to the required format for the event listing
        $lists = $recentEvents->map(function ($event) {
            return [
                'title' => $event->event_title,
                'description' => $event->event_description,
                'date_time' => $event->date_time,
            ];
        });

        return view('client.pages.event.index', ['bookings' => $bookings, 'client' => $client, 'lists' => $lists, 'searchResults' => []]);
    }

    public function search_events(Client $client, HttpRequest $request) {
        $query = $request->input('search');
        $lists = Event::where('client_id', $client->id)
            ->where(function($q) use ($query) {
                $q->where('event_title', 'like', '%'.$query.'%')
                    ->orWhere('event_description', 'like', '%'.$query.'%');
            })
            ->get();

        return view('client.pages.event.search_results', ['lists' => $lists]);
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
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    /**
     * Show the step One Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function createS1(HttpRequest $request, $client_id)
    {
        $client = Client::find($client_id);

        $event = $request->session()->get('event');
        return view('client.pages.event.createS1', compact(['event', 'client']));
    }


    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postcreateS1(HttpRequest $request, $client_id)
    {
        $client = Client::find($client_id);

        $validatedData = $request->validate([
            'event_title' => 'required|unique:events',
            'event_description'=>'required',
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
            'date_time' => 'required',
            'end_time' => 'required',
            'time_zone' => 'required',
            'venue' => 'required',
        ]);

        if (empty($request->session()->get('event'))) {
            $event = new Event();
            $event->fill($validatedData);
            $request->session()->put('event', $event);
        } else {
            $event = $request->session()->get('event');
            $event->fill($validatedData);
            $request->session()->put('event', $event);
        }

        return redirect()->route('client.createS2', ['client' => $client->id]);
    }


    /**
     * Show the step Two Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function createS3(HttpRequest $request, $client_id)
    {
        $client = Client::find($client_id);
        $event = $request->session()->get('event');
        $images = Image::orderBy('id')->get();

        return view('client.pages.event.createS3', compact(['event', 'images', 'client']));
    }


    /**
     * Show the step Two Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function postcreateS3(HttpRequest $request, $client_id)
    {
        $client = Client::find($client_id);

        $validatedData = $request->validate([
            'path' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alt_text' => 'required',
            'description' => 'required',
        ]);

        $event = $request->session()->get('event');

        // Set the client_id for the event
        $event->client_id = $client->id;

        // Save the event to the database
        $event->save();

        if ($request->hasFile('path')) {
            $image = new Image($validatedData);
            $file = $request->file('path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $filename);
            $image->path = 'storage/images/' . $filename;
            $image->save();

            $event->Images()->attach($image->id);
            $request->session()->put('event', $event);
        }

        return redirect()->route('client.createS4', ['client' => $client->id]);
    }




    /**
     * Show the step Three Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function createS2(HttpRequest $request, $client_id)
    {
        $client = Client::find($client_id);

        $event = $request->session()->get('event');

        return view('client.pages.event.createS2', compact(['event', 'client']));
    }


    /**
     * Show the step Three Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function postcreateS2(HttpRequest $request, $client_id)
    {
        $client = Client::find($client_id);

        $validatedData = $request->validate([
            'max_tickets_per_customer' => 'required',
            'ticket_price' => 'required'
        ]);

        $event = $request->session()->get('event');
        $event->fill($validatedData);
        $request->session()->put('event', $event);

        return redirect()->route('client.createS3', ['client' => $client->id]);
    }


    /**
     * Show the step Four Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function createS4(HttpRequest $request, $client_id)
    {
        $client = Client::find($client_id);

        $event = $request->session()->get('event');
        $event->client_id = auth()->id();  // auth()->id()

        return view('client.pages.event.createS4', compact(['event', 'client']));
    }


    /**
     * Show the step Four Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function postcreateS4(HttpRequest $request)
    {
        // Get the client_id from the authenticated user
        $client_id = Auth::user()->client_id();

        $client = Client::find($client_id);

        $event = $request->session()->get('event');
        // Set the correct client_id for the event
        $event->client_id = $client_id;
        $event->save();

        $request->session()->forget('event');

        return redirect()->route('client.client_events', ['client' => $client])->with('status', 'New event has been created!');
    }



}
