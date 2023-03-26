<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookings = array();
        $events = Event::with('clients')->with('images')->get();
        foreach ($events as $event) {
            $bookings[] = [
                'event_title' => $event->title,
                'date_time' => $event->date,
                'time_zone' => $event->time,
            ];
        }

        return view('events.index', compact(['bookings'=>$bookings]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients = Client::orderBy('id')->get();
        $images = Image::orderBy('id')->get();
        return view('events.createS1',compact(['clients','images']));

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
    public function createS1(Request $request)
    {
        $event = $request->session()->get('event');

        return view('events.createS1',compact('event'));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postcreateS1(Request $request)
    {
        $validatedData = $request->validate([
            'event_title' => 'required|unique:events',
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
            'date_time' => 'required',
            'time_zone' => 'required',
        ]);

        if(empty($request->session()->get('event'))){
            $event = new Event();
            $event->fill($validatedData);
            $request->session()->put('event', $event);
        }else{
            $event = $request->session()->get('event');
            $event->fill($validatedData);
            $request->session()->put('event', $event);
        }

        return redirect()->route('events.createS2');
    }

    /**
     * Show the step Two Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function createS2(Request $request)
    {
        $event = $request->session()->get('event');
        $images = Image::orderBy('name')->get();

        return view('events.createS2',compact(['event','images']));
    }

    /**
     * Show the step Two Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateS2(Request $request)
    {
        $validatedData = $request->validate([
            'path' => 'required',
            'alt_text' => 'required',
            'description' => 'required',
            'event_id' => '',
            'image_id' => ''
        ]);

        $event = $request->session()->get('event');
        $event->fill($validatedData)->Images()->sync($request->image_ids);;
        $request->session()->put('event', $event);

        return redirect()->route('events.createS3');
    }

    /**
     * Show the step Three Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function createS3(Request $request)
    {
        $event = $request->session()->get('event');

        return view('events.createS3',compact('event'));
    }

    /**
     * Show the step Three Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateS3(Request $request)
    {
        $validatedData = $request->validate([
            'max_tickets_per_customer' => 'required',
            'ticket_price' => 'required'
        ]);

        $event = $request->session()->get('event');
        $event->fill($validatedData);
        $request->session()->put('event', $event);

        return redirect()->route('events.createS4',compact('event'));
    }

    /**
     * Show the step Four Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function createS4(Request $request)
    {
        $event = $request->session()->get('event');

        return view('events.createS4',compact('event'));
    }

    /**
     * Show the step Four Form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateS4(Request $request)
    {
        $event = $request->session()->get('event');
        $event->save();
        $request->session()->forget('event');

        return redirect()->route('events.index');
    }



}
