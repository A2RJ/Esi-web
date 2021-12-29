<?php

namespace App\Http\Controllers;

use App\Models\Event_winner;
use App\Models\Events;
use App\Models\Squads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Event_winnerController extends Controller
{
    public function index()
    {
        $event_winner = Event_winner::join('events', 'event_winners.event_id', 'events.id_event')
            ->join('squads', 'event_winners.squad_id', 'squads.id_squad')
            ->select('event_winners.*', 'events.event_name', 'squads.squad_name')
            ->where('events.user_id', Auth::user()->id_user)
            ->paginate(10);

        return view('Event_winner.index', compact('event_winner'));
    }

    public function create($id)
    {
        $events = Events::where('user_id', Auth::user()->id_user)->find($id);
        $squads = Squads::join('event_teams', 'squads.id_squad', 'event_teams.squad_id')
            ->where('event_teams.event_id', $id)
            ->select('squads.*')
            ->get();
        return view('Event_winner.create', compact('events', 'squads'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'event_id' => 'required',
            'squad_id' => 'required',
        ]);
        Event_winner::create($request->all());
        return redirect('anggota/events/setEvent/' . $request->event_id)->with('event_winner', 'Event winner created successfully');
    }

    public function show($id)
    {
        $event_winner = Event_winner::find($id);
        return view('Event_winner.show', compact('event_winner'));
    }

    public function edit($id)
    {
        $events = Events::all();
        $squads = Squads::all();
        $event_winner = Event_winner::find($id);
        return view('Event_winner.edit', compact('event_winner', 'events', 'squads'));
    }

    public function update(Request $request, $id)
    {
        Event_winner::find($id)->update($request->all());
        return redirect('anggota/events/setEvent/' . $request->event_id)->with('event_winner', 'Event winner updated successfully');
    }

    public function destroy($id)
    {
        $event = Event_winner::find($id);
        $event_id = $event->event_id;
        $event->delete();

        return redirect('anggota/events/setEvent/' . $event_id)->with('event_winner', 'Event winner deleted successfully');
    }
}
