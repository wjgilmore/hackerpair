<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;

use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$events = Event::paginate(10);
        $events = Event::withoutGlobalScopes()->paginate(10);
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
