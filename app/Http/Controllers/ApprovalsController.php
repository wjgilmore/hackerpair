<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Ticket;

class ApprovalsController extends Controller
{

    public function show($id)
    {

        $ticket = Auth::user()->tickets()->where('event_id', $id)->first()->pivot;

        return response()->json($ticket);

    }

    public function store(Request $request)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy($id)
    {

    }

}

