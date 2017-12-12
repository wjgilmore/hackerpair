<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;

use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create','store','edit','update','destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events = Event::with(['category', 'organizer', 'state'])
            ->orderBy('start_date', 'desc')
            ->paginate();

        return view('events.index')->with('events', $events);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventStoreRequest $request
     * @return \Illuminate\Http\Response
     */


    public function store(EventStoreRequest $request)
    {

        $event = Event::create(
            $request->input()
        );

        if ($request->has('published'))
        {
            $event->published = 1;
            $event->save();
        }

        // I am only geocoding the zip code because the generated events
        // in the EventsTableSeeder contain contrived city names which
        // will cause the geocoder to return zero results.
        $coords = app('geocoder')->geocode($event->zip)->get();
        $event->lat = $coords->first()->getCoordinates()->getLatitude();
        $event->lng = $coords->first()->getCoordinates()->getLongitude();
        $event->save();

        $request->user()->hostedEvents()->save($event);

        flash('Event created!')->success();
        return redirect()->route('events.show', ['event' => $event]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

        $event->update(
            $request->input()
        );

        // I am only geocoding the zip code because the generated events
        // in the EventsTableSeeder contain contrived city names which
        // will cause the geocoder to return zero results.
        $coords = app('geocoder')->geocode($event->zip)->get();
        $event->lat = $coords->first()->getCoordinates()->getLatitude();
        $event->lng = $coords->first()->getCoordinates()->getLongitude();
        $event->save();

        flash('Event updated!')->success();

        return redirect()->route('events.edit', $event);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {

        $event->delete();

        return redirect()
            ->route('events.index')
            ->with('message', 'The event has been deleted!');

    }
}
