<?php

namespace App\Http\Controllers;

use App\Models\Event_teams;
use App\Models\Events;
use App\Models\Squads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Event_teamsController extends Controller
{
    public function index()
    {
        $event_teams = Event_teams::join('events', 'event_teams.event_id', 'events.id_event')
            ->join('squads', 'event_teams.squad_id', 'squads.id_squad')
            ->select('event_teams.*', 'events.event_name', 'squads.squad_name')
            ->where('events.user_id', Auth::user()->id_user)
            ->paginate(10);

        return view('event_teams.index', compact('event_teams'));
    }

    public function create($id)
    {
        $events = Events::where('user_id', Auth::user()->id_user)->find($id);
        $squads = Squads::all();
        return view('event_teams.create', compact('squads', 'events'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "event_id" => "required",
            "squad_id" => "required",
            "ispaid" => "required",
        ]);

        Event_teams::create($request->all());
        return redirect('events/setEvent/' . $request->event_id)->with('event_teams', 'Teams created successfully.');
    }

    public function storeJoin(Request $request)
    {
        $request['ispaid'] = 0;
        $this->validate($request, [
            "event_id" => "required",
            "squad_id" => "required",
            "ispaid" => "required",
        ]);

        // check squad_id is already in event_teams
        $event_teams = Event_teams::where('event_id', $request->event_id)
            ->where('squad_id', $request->squad_id)
            ->first();

        if ($event_teams) {
            return redirect('home/event/' . $request->event_id)->with('event_teams', 'Squad already in event.');
        } else {
            Event_teams::create($request->all());
            return redirect('home/event/' . $request->event_id)->with('event_teams', 'Join event successfully.');
        }
    }

    public function edit($id)
    {
        $event_team = Event_teams::find($id)->select('id_event_teams', 'event_id', 'squad_id', 'ispaid')->first();
        $events = Events::find($event_team->event_id)
            ->select('id_event', 'event_name')->get();
        $squads = Squads::where('id_squad', $event_team->squad_id)
            ->select('id_squad', 'squad_name')->get();

        return view('event_teams.edit', compact('event_team', 'squads', 'events'));
    }

    public function update(Request $request, $id)
    {
        Event_teams::find($id)->update($request->all());
        return redirect('events/setEvent/' . $request->event_id)->with('event_teams', 'Teams updated successfully.');
    }

    public function show($id)
    {
        $event_team = Event_teams::find($id);
        return view('event_teams.show', compact('event_team'));
    }

    public function destroy($id)
    {
        $event_team = Event_teams::find($id);
        $event_id = $event_team->event_id;
        $event_team->delete();
        return redirect('events/setEvent/' . $event_id)->with('event_teams', 'Teams deleted successfully.');
    }
}
