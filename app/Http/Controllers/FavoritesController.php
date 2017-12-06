<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $favoritedEvents = \Auth::user()->favoriteEvents()->paginate();
        return view('favorites.index')->with('events', $favoritedEvents);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (\Auth::user()->favoritedEvent($request->get('id'))) {
            \Auth::user()->favoriteEvents()->detach($request->get('id'));
        } else {
            $event = Event::find($request->get('id'));
            \Auth::user()->favoriteEvents()->save($event);
        }

    }

}

