<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserAttendedEventsController extends Controller
{

    public function index(User $user)
    {
        $events = $user->attendedEvents()->paginate();
        return view('accounts.events.attended.index')->with('events', $events);
    }

}
