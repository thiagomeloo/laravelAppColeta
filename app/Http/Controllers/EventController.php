<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController
{
    public function create()
    {

        return view('pages.dashboard.events.create');
    }

    public function store(Request $request)
    {

        return redirect()->route('explore.index');
    }
}
