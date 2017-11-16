<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationsController extends Controller
{

    public function index()
    {
        return view('locations.index');
    }

}
