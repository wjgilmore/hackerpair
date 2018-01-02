<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class WelcomeController extends Controller
{

    function index()
    {

        $events = Event::with(['category', 'organizer', 'state'])
            ->orderBy('start_date', 'desc')
            ->paginate();

        return view('welcome.index')->with('events', $events);

    }

}
