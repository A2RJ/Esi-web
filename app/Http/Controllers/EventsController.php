<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::all();
        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        $event = Events::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "id_event" => "required",
            "game_id" => "required",
            "user_id" => "required",
            "event_name" => "required",
            "event_image" => "required",
            "slot" => "required",
            "pricepool" => "required",
            "detail" => "required",
            "peraturan" => "required",
            "start" => "required",
            "end" => "required"
        ]);
        Events::create($request->all());

        return redirect('/event');
    }

    public function edit($id)
    {
        $event = Events::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        Events::findOrFail($id)->update($request->all());

        return redirect('/event');
    }

    public function destroy($id)
    {
        $event = Events::findOrFail($id);
        $event->delete();

        return redirect('/event');
    }
}
