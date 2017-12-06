<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Event;
use App\State;

class StatesController extends Controller
{

    public function index()
    {

        $states = Event::select([DB::raw('count(id) as total'), 'state_id'])
            ->where('published', 1)
            ->orderBy('total', 'desc')
            ->orderBy('state_id', 'asc')
            ->groupBy('state_id')->get();

        return view('states.index')->withStates($states);

    }

    public function show(State $state)
    {

        $events = $state->events()->upcoming()->paginate();

        return view('states.show')->withState($state)->withEvents($events);

    }

}

