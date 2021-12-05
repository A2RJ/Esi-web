<?php

namespace App\Http\Controllers;

use App\Models\Event_inv_teams;
use Illuminate\Http\Request;

class Event_inv_teamsController extends Controller
{
    public function index()
    {
        $event_inv_teams = Event_inv_teams::all();
        return view('event_inv_teams.index', compact('event_inv_teams'));
    }

    public function create()
    {
        return view('event_inv_teams.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'event_id' => 'required',
            'inv_team_id' => 'required',
        ]);

        Event_inv_teams::create($request->all());
        return redirect()->route('event_inv_teams.index')->with('success', 'Event_inv_teams created successfully');
    }

    public function show($id)
    {
        $event_inv_teams = Event_inv_teams::findOrFail($id);
        return view('event_inv_teams.show', compact('event_inv_teams'));
    }

    public function edit($id)
    {
        $event_inv_teams = Event_inv_teams::findOrFail($id);
        return view('event_inv_teams.edit', compact('event_inv_teams'));
    }

    public function update(Request $request, $id)
    {
        Event_inv_teams::find($id)->update($request->all());
        return redirect()->route('event_inv_teams.index')->with('success', 'Event_inv_teams updated successfully');
    }

    public function destroy($id)
    {
        Event_inv_teams::findOrFail($id)->delete();
        return redirect()->route('event_inv_teams.index')->with('success', 'Event_inv_teams deleted successfully');
    }
}
