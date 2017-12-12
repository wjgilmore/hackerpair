<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserHostedEventsController extends Controller
{

    public function index(User $user)
    {
        $events = $user->hostedEvents()->paginate();
        return view('accounts.events.hosted.index')->with('events', $events);
    }

}
