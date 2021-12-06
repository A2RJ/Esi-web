<?php

namespace App\Http\Controllers;

use App\Models\Event_winner;
use App\Models\Events;
use App\Models\Squads;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class Event_winnerController extends Controller
{
    public function index()
    {
        $event_winner = Event_winner::with('events', 'squads')
            ->paginate(10);
        return view('event_winner.index', compact('event_winner'));
    }

    public function create()
    {
        $events = Events::all();
        $squads = Squads::all();
        return view('event_winner.create', compact('events', 'squads'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'event_id' => 'required',
            'squad_id' => 'required',
        ]);
        Event_winner::create($request->all());
        return redirect('event_winner')->with('success', 'Event winner created successfully');
    }

    public function show($id)
    {
        $event_winner = Event_winner::find($id);
        return view('event_winner.show', compact('event_winner'));
    }

    public function edit($id)
    {
        $events = Events::all();
        $squads = Squads::all();
        $event_winner = Event_winner::find($id);
        return view('event_winner.edit', compact('event_winner', 'events', 'squads'));
    }

    public function update(Request $request, $id)
    {
        Event_winner::find($id)->update($request->all());
        return redirect('event_winner')->with('success', 'Event winner updated successfully');
    }

    public function destroy($id)
    {
        Event_winner::find($id)->delete();
        return redirect('event_winner')->with('success', 'Event winner deleted successfully');
    }
}
