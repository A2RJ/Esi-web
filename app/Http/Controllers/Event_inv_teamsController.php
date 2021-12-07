<?php

namespace App\Http\Controllers;

use App\Models\Event_inv_teams;
use App\Models\Event_teams;
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

    // get all event_inv_teams by squad_id
    public function getEventInvTeamsBySquadId($id)
    {
        return Event_inv_teams::where('squad_id', $id)->where('status', false)->get();
    }

    // accept event_inv_teams
    public function acceptEventInvTeams(Request $request)
    {
        // update event_inv_teams status
        Event_inv_teams::where('id_event_inv_teams', $request->id_event_inv_teams)
            ->update(['status' => true]);
        Event_teams::create([
            'event_id' => $request->event_id,
            'squad_id' => $request->squad_id,
            'ispaid' => $request->ispaid,
        ]);
        return true;
    }

    // reject event_inv_teams
    public function rejectEventInvTeams(Request $request)
    {
        // update event_inv_teams status
        Event_inv_teams::where('id_event_inv_teams', $request->id_event_inv_teams)
            ->update(['status' => false]);
        return true;
    }
}
