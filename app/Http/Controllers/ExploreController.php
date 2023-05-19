<?php

namespace App\Http\Controllers;

use App\Models\Event;

class ExploreController
{
    public function index()
    {
        $events = Event::all();
        return view('pages.dashboard.explore.index', compact('events'));
    }
}
