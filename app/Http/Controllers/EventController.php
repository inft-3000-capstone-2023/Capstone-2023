<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;

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

    public function client_events(Client $client) {
        $bookings = array();

        $events = $client->events;

        foreach ($events as $event) {
            $bookings[] = [
                'title' => $event->event_title,
                'start' => $event->date_time,
                'allDay' => true
                // If you have an 'end_time' property, add it here
                // 'end' => $event->end_time
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

    public function searchEvents(Client $client)
    {
        $searchTerm = Request::get('search');

        // Replace this with the appropriate model relationship and columns for searching
        $events = $client->events()->where('event_title', 'LIKE', "%{$searchTerm}%")
            ->orWhere('event_description', 'LIKE', "%{$searchTerm}%")
            ->get();

        // You can pass the events to your view or return them as JSON
        return view('client.pages.event.index', ['client' => $client, 'events' => $events, 'searchResults' => $events]);
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
    public function createS1(HttpRequest $request, Client $client)
    {
        $event = $request->session()->get('event');
        return view('client.pages.event.createS1', compact(['event', 'client']));
    }


    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postcreateS1(HttpRequest $request, Client $client)
    {
        $validatedData = $request->validate([
            'event_title' => 'required|unique:events',
            'event_description'=>'required',
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
            'date_time' => 'required',
            'time_zone' => 'required',
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
    public function createS2(HttpRequest $request, Client $client)
    {
        $event = $request->session()->get('event');
        $images = Image::orderBy('id')->get();

        return view('client.pages.event.createS2', compact(['event', 'images', 'client']));
    }


    /**
     * Show the step Two Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function postcreateS2(HttpRequest $request, Client $client, Image $image)
    {
        $validatedData = $request->validate([
            'path' => 'required',
            'alt_text' => 'required',
            'description' => 'required',
            'event_id' => '',
            'image_id' => ''
        ]);

        $event = $request->session()->get('event');
        $event->fill($validatedData)->Images()->sync($request->image_ids);
        $request->session()->put('event', $event);

        return redirect()->route('client.createS3', ['client' => $client->id, 'image' => $image->id]);
    }


    /**
     * Show the step Three Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function createS3(HttpRequest $request, Client $client)
    {
        $event = $request->session()->get('event');

        return view('client.pages.event.createS3', compact(['event', 'client']));
    }


    /**
     * Show the step Three Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function postcreateS3(HttpRequest $request, Client $client)
    {
        $validatedData = $request->validate([
            'max_tickets_per_customer' => 'required',
            'ticket_price' => 'required'
        ]);

        $event = $request->session()->get('event');
        $event->fill($validatedData);
        $request->session()->put('event', $event);

        return redirect()->route('client.createS4', ['client' => $client->id]);
    }


    /**
     * Show the step Four Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function createS4(HttpRequest $request, Client $client)
    {
        $event = $request->session()->get('event');
        $event->client_id = auth()->id();  // auth()->id()

        return view('client.pages.event.createS4', compact(['event', 'client']));
    }


    /**
     * Show the step Four Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function postcreateS4(HttpRequest $request, Client $client)
    {
        $event = $request->session()->get('event');
        $client = $event->client;
        $event->save();
        $request->session()->forget('event');

        return redirect()->route('client.client_events', ['client' => $client->id])->with('status', 'New event has been created!');
    }


}
