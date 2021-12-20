<?php

namespace App\Http\Controllers;

use App\Models\Event_inv_teams;
use App\Models\Event_teams;
use App\Models\Events;
use App\Models\Players;
use App\Models\Squads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Event_inv_teamsController extends Controller
{
    public function index()
    {
        $event_inv_teams = Event_inv_teams::join('squads', 'event_inv_teams.squad_id', 'squads.id_squad')
            ->join('events', 'event_inv_teams.event_id', 'events.id_event')
            ->select('event_inv_teams.*', 'squads.squad_name', 'events.event_name')
            ->where('events.user_id', Auth::user()->id_user)
            ->paginate(10);

        return view('event_inv_teams.index', compact('event_inv_teams'));
    }

    public function create($id)
    {
        $events = Events::where('user_id', Auth::user()->id_user)->find($id);
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
        return redirect('events/setEvent/' . $request->event_id)->with('event_inv_teams', 'Event_inv_teams created successfully');
    }

    public function show($id)
    {
        $event_inv_teams = Event_inv_teams::join('events', 'events.id_event', 'event_inv_teams.event_id')
            ->findOrFail($id);
        return view('event_inv_teams.show', compact('event_inv_teams'));
    }

    public function edit($id)
    {
        $events = Events::where('user_id', Auth::user()->id_user)->get();
        $squads = Squads::all();
        $event_inv_teams = Event_inv_teams::findOrFail($id);
        return view('event_inv_teams.edit', compact('event_inv_teams', 'events', 'squads'));
    }

    public function update(Request $request, $id)
    {
        Event_inv_teams::find($id)->update($request->all());
        return redirect('events/setEvent/' . $request->event_id)->with('event_inv_teams', 'Event_inv_teams updated successfully');
    }

    public function destroy($id)
    {
        $event = Event_inv_teams::findOrFail($id);
        $event_id = $event->event_id;
        $event->delete();

        return redirect('events/setEvent/' . $event_id)->with('event_inv_teams', 'Event_inv_teams deleted successfully');
    }

    public function invite()
    {
        // join player with squad where player.user_id = Auth::user()->id_user
        $squads = Squads::join('players', 'squads.id_squad', 'players.squad_id')
            ->where('players.user_id', Auth::user()->id_user)
            ->select('squads.*')
            ->distinct()
            ->get();
        // get squad_id from $squads
        $squad_id = $squads->pluck('id_squad');
        // get event_inv_teams where squad_id = $squad_id
        $event_inv_teams = Event_inv_teams::join('events', 'events.id_event', 'event_inv_teams.event_id')
            ->join('squads', 'squads.id_squad', 'event_inv_teams.squad_id')
            ->whereIn('event_inv_teams.squad_id', $squad_id)
            ->select('event_inv_teams.*', 'events.event_name', 'squads.squad_name')
            ->paginate(10);

        return view('event_inv_teams.invite', compact('event_inv_teams'));
    }

    public function terima($id)
    {
        $event_inv_teams = Event_inv_teams::findOrFail($id);
        Event_teams::create([
            'event_id' => $event_inv_teams->event_id,
            'squad_id' => $event_inv_teams->squad_id,
        ]);
        $event_inv_teams->status = 1;
        $event_inv_teams->save();

        return redirect('event_inv_teams/invite')->with('event_inv_teams', 'Event_inv_teams terima successfully');
    }
}
