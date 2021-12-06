<?php

namespace App\Http\Controllers;

use App\Models\Event_inv_teams;
use App\Models\Events;
use App\Models\Squads;
use Illuminate\Http\Request;

class Event_inv_teamsController extends Controller
{
    public function index()
    {
        $event_inv_teams = Event_inv_teams::with('squads', 'events')
            ->paginate(10);
        return view('event_inv_teams.index', compact('event_inv_teams'));
    }

    public function create()
    {
        $events = Events::all();
        $squads = Squads::all();
        return view('event_inv_teams.create', compact('events', 'squads'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "event_id" => "required",
            "squad_id" => "required",
        ]);

        Event_inv_teams::create($request->all());
        return redirect('event_inv_teams')->with('success', 'Event_inv_teams created successfully');
    }

    public function show($id)
    {
        $event_inv_teams = Event_inv_teams::join('events', 'events.id_event', 'event_inv_teams.event_id')
            ->findOrFail($id);
        return view('event_inv_teams.show', compact('event_inv_teams'));
    }

    public function edit($id)
    {
        $events = Events::all();
        $squads = Squads::all();
        $event_inv_teams = Event_inv_teams::findOrFail($id);
        return view('event_inv_teams.edit', compact('event_inv_teams', 'events', 'squads'));
    }

    public function update(Request $request, $id)
    {
        Event_inv_teams::find($id)->update($request->all());
        return redirect('event_inv_teams')->with('success', 'Event_inv_teams updated successfully');
    }

    public function destroy($id)
    {
        Event_inv_teams::findOrFail($id)->delete();
        return redirect('event_inv_teams')->with('success', 'Event_inv_teams deleted successfully');
    }
}
