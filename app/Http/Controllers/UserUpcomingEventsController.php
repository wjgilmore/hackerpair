<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserUpcomingEventsController extends Controller
{

    public function index(User $user)
    {
        $events = $user->upcomingEvents()->paginate();
        return view('events.upcoming.index')->with('events', $events);
    }

}
