<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{

    public function index()
    {
        $events = [
            'Laravel Hacking and Coffee',
            'IoT with Raspberry Pi',
            'Free Vue.js Lessons'
        ];
        return view('events.index')->with('events', $events);
    }

    public function show($id)
    {

        $data = [
            'name' => 'Laravel Hacking and Coffee',
            'date' => date('Y-m-d')
        ];

        return view('events.show')->with($data);

    }

    public function category($category, $subcategory='all')
    {
        $subcategory = $subcategory ?: 'all';
        dd("Category: {$category} Subcategory: {$subcategory}");
    }

}
