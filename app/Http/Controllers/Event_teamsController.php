<?php

namespace App\Http\Controllers;

use App\Models\Event_teams;
use Illuminate\Http\Request;

class Event_teamsController extends Controller
{
    public function index()
    {
        $event_teams = Event_teams::all();
        return view('event_teams.index', compact('event_teams'));
    }

    public function create()
    {
        return view('event_teams.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'event_id' => 'required',
            'team_id' => 'required',
        ]);

        Event_teams::create($request->all());
        return redirect()->route('event_teams.index')->with('message', 'Item created successfully.');
    }

    public function edit($id)
    {
        $event_team = Event_teams::findOrFail($id);
        return view('event_teams.edit', compact('event_team'));
    }

    public function update(Request $request, $id)
    {
        Event_teams::findOrFail($id)->update($request->all());
        return redirect()->route('event_teams.index')->with('message', 'Item updated successfully.');
    }

    public function show($id)
    {
        $event_team = Event_teams::findOrFail($id);
        return view('event_teams.show', compact('event_team'));
    }

    public function destroy($id)
    {
        $event_team = Event_teams::findOrFail($id)->delete();
        return redirect()->route('event_teams.index')->with('message', 'Item deleted successfully.');
    }
}
