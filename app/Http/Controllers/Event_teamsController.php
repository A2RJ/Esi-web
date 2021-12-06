<?php

namespace App\Http\Controllers;

use App\Models\Event_teams;
use App\Models\Events;
use App\Models\Squads;
use Illuminate\Http\Request;

class Event_teamsController extends Controller
{
    public function index()
    {
        $event_teams = Event_teams::with('squads', 'events')
            ->paginate(10);
        return view('event_teams.index', compact('event_teams'));
    }

    public function create()
    {
        $events = Events::all();
        $squads = Squads::all();
        return view('event_teams.create', compact('squads', 'events'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "event_id" => "required",
            "squad_id" => "required",
            "isfree" => "required",
            "ispaid" => "required",
        ]);

        Event_teams::create($request->all());
        return redirect('event_teams')->with('message', 'Teams created successfully.');
    }

    public function edit($id)
    {
        $event_team = Event_teams::find($id);
        $events = Events::all();
        $squads = Squads::all();
        return view('event_teams.edit', compact('event_team', 'squads', 'events'));
    }

    public function update(Request $request, $id)
    {
        Event_teams::find($id)->update($request->all());
        return redirect('event_teams')->with('message', 'Teams updated successfully.');
    }

    public function show($id)
    {
        $event_team = Event_teams::find($id);
        return view('event_teams.show', compact('event_team'));
    }

    public function destroy($id)
    {
        $event_team = Event_teams::find($id)->delete();
        return redirect('event_teams')->with('message', 'Teams deleted successfully.');
    }
}
