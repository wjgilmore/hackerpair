<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguagesController extends Controller
{

    public function index()
    {
        return view('languages.index');
    }

}
