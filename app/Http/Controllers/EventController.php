<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TypeAction;
use App\Models\TypeMaterial;
use App\Services\Event\CreateEventService;
use App\Services\Event\EditEventService;
use Illuminate\Http\Request;

class EventController
{
    public function create()
    {
        $typesMaterials = TypeMaterial::all()->sortBy("name");
        $typesActions = TypeAction::all()->sortBy("name");

        return view('pages.dashboard.events.create', compact('typesMaterials', 'typesActions'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['owner_id'] = auth()->user()?->id ?? null;
        $response = CreateEventService::execute($data);

        if ($response->status) {
            return redirect()->route('dashboard.explore.index');
        } else {
            return redirect()->back()->withInput()->withErrors($response->errors);
        }
    }

    public function show(Event $event)
    {
        return view('pages.dashboard.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $typesMaterials = TypeMaterial::all()->sortBy("name");

        return view('pages.dashboard.events.edit', compact('event', 'typesMaterials'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->all();
        $response = EditEventService::execute($data, $event);

        if ($response->status) {
            return redirect()->route('dashboard.events.show', ['event' => $event->id]);
        } else {
            return redirect()->back()->withInput()->withErrors($response->message->text);
        }
    }
}
