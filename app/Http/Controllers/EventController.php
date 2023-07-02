<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event\CreateEventRequest;
use App\Models\Event;
use App\Models\TypeAction;
use App\Models\TypeMaterial;
use App\Services\Event\EditEventService;
use App\Services\Event\EventService;
use Illuminate\Http\Request;

class EventController
{
    /**
     * Retorna a view de criação de evento.
     */
    public function create()
    {
        $typesMaterials = TypeMaterial::all()->sortBy("name");
        $typesActions = TypeAction::all()->sortBy("name");

        return view('pages.dashboard.events.create', compact('typesMaterials', 'typesActions'));
    }

    /**
     * Cria um novo evento.
     */
    public function store(CreateEventRequest $request, EventService $eventService)
    {
        $data = $request->validated();

        $data['owner_id'] = auth()->user()?->id ?? null;
        $response = $eventService->save($data);

        if ($response->hasOk()) {
            return redirect()->route('dashboard.explore.index');
        } else {
            return redirect()->back()->withInput()->withErrors($response->getMessage()->text);
        }
    }

    /**
     * Retorna a view de Visualização de evento.
     */
    public function show(Event $event)
    {
        return view('pages.dashboard.events.show', compact('event'));
    }

    /**
     * Retorna a view de edição de evento.
     */
    public function edit(Event $event)
    {
        $typesMaterials = TypeMaterial::all()->sortBy("name");

        return view('pages.dashboard.events.edit', compact('event', 'typesMaterials'));
    }

    /**
     * Atualiza um evento.
     */
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

    /**
     * Retorna a view de meus eventos.
     */
    public function myEvents()
    {
        $events = [];
        return view('pages.dashboard.events.myEvents', compact('events'));
    }
}
