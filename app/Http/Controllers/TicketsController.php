<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Event;

class TicketsController extends Controller
{
    /**
     * Display user's ticket history
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Add a user to an event's attendance list
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        \Auth::user()->upcomingEvents()->syncWithoutDetaching([$request->get('id') => ['deleted_at' => NULL]]);

        return response()->json(['error' => 'none'], 200);

    }

    /**
     * Remove a user from an event's attendance list
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        \Auth::user()->upcomingEvents()->syncWithoutDetaching([$id => ['deleted_at' => DB::raw('NOW()')]]);

        return response()->json(['error' => 'none'], 200);

    }
}

