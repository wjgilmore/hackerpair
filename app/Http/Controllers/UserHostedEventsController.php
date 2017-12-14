<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EventRequest;

use App\Event;
use App\User;

class UserHostedEventsController extends Controller
{

    public function index(User $user)
    {
        $events = $user->hostedEvents()->paginate();
        return view('events.hosted.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.hosted.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request, User $user)
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Event $event)
    {
        return view('events.hosted.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EventRequest  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, User $user, Event $event)
    {

        $event->update(
            $request->input()
        );

        $event->published = $request->has('published') ? 1 : 0;

        $event->save();

        // I am only geocoding the zip code because the generated events
        // in the EventsTableSeeder contain contrived city names which
        // will cause the geocoder to return zero results.
        $coords = app('geocoder')->geocode($event->zip)->get();
        $event->lat = $coords->first()->getCoordinates()->getLatitude();
        $event->lng = $coords->first()->getCoordinates()->getLongitude();
        $event->save();

        flash('Event updated!')->success();

        return redirect()->route('users.hosted-events.edit', [$user, $event]);

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
            ->route('events.hosted.index')
            ->with('message', 'The event has been deleted!');

    }

}
