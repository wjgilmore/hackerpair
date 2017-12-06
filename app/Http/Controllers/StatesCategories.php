<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\Category;
use App\State;

class StatesCategoriesController extends Controller
{

    public function show(State $state, Language $language)
    {

        $events = Event::upcoming()->where('state_id', $state->id)->where('language_id', $language->id)->paginate();

        return view('states.language')
            ->withState($state)
            ->withLanguage($language)
            ->withEvents($events);

    }

}

