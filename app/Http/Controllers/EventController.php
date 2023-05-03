<?php

namespace App\Http\Controllers;

use App\Models\TypeMaterial;
use App\Services\Event\CreateEventService;
use Illuminate\Http\Request;

class EventController
{
    public function create()
    {
        $typesMaterials = TypeMaterial::all()->sortBy("name");

        return view('pages.dashboard.events.create', compact('typesMaterials'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['owner_id'] = auth()->user()?->id ?? 1;
        $response = CreateEventService::execute($data);

        dd($response);

        return redirect()->route('dashboard.explore.index');
    }
}
