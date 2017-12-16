<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;

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

        $events = Event::with(['category', 'organizer', 'state'])
            ->orderBy('start_date', 'desc')
            ->paginate();

        return view('events.index')->with('events', $events);

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


}
