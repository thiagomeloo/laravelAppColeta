<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TypeMaterial;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $typesMaterials = TypeMaterial::all();
        $events = Event::all();

        return view('pages.dashboard.map.index', compact('typesMaterials', 'events'));
    }
}
