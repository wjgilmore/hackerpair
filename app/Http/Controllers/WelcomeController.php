<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class WelcomeController extends Controller
{

    function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate();
        return view('welcome.index')->with('events', $events);
    }

}
