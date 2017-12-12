<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Event;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $states = Event::select([DB::raw('count(id) as total'), 'state_id'])
            ->where('published', 1)
            ->orderBy('total', 'desc')
            ->orderBy('name', 'asc')
            ->groupBy('state_id')->get();

        $cities = Event::select([DB::raw('count(id) as total'), 'city', 'state_id'])
            ->upcoming()
            ->orderBy('total', 'desc')
            ->orderBy('city', 'asc')
            ->groupBy('city', 'state_id')
            ->get();

        return view('locations.index')->withStates($states)->withCities($cities);

    }

}
