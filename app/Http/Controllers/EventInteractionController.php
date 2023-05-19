<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventInteraction;
use Illuminate\Http\Request;

class EventInteractionController extends Controller
{
    public function store(Request $request, Event $event)
    {
    }

    public function delete(Request $request, EventInteraction $eventInteraction)
    {
    }
}
