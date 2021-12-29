<?php

namespace App\Http\Controllers;

use App\Classes\Upload;
use App\Models\Event_inv_teams;
use App\Models\Event_teams;
use App\Models\Event_winner;
use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Games;
use App\Models\Players;
use App\Models\Squads;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::with('owner', 'game')->latest();

        // if has event search like
        if (request()->has('event')) {
            $events = $events->where('event_name', 'LIKE', '%' . request('event') . '%');
        }

        $events = $events->paginate(10);
        return view('Events.index', compact('events'));
    }

    public function show($id)
    {
        $event = Events::with('owner', 'game')
            ->find($id);
        $teams = Event_teams::join('squads', 'event_teams.squad_id', 'squads.id_squad')
            ->where('event_teams.event_id', $id)
            ->get();
        $winners = Event_winner::join('squads', 'event_winners.squad_id', 'squads.id_squad')
            ->where('event_winners.event_id', $id)
            ->get();

        return view('Events.detail', compact('event', 'teams', 'winners'));
    }

    public function create()
    {
        $games = Games::all();
        $users = Users::all();
        return view('Events.create', compact('games', 'users'));
    }

    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id_user;

        $this->validate($request, [
            "game_id" => "required",
            "user_id" => "required",
            "event_name" => "required",
            "event_image" => "required",
            "slot" => "required",
            "price" => "required",
            "pricepool" => "required",
            "isfree" => "required",
            "detail" => "required",
            "peraturan" => "required",
            "start" => "required",
            "end" => "required"
        ]);
        $event = Events::create($request->all());
        $event->event_image = Upload::uploadFile($request, 'event_image');
        $event->save();

        return redirect('anggota/events/events')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $games = Games::all();
        $users = Users::all();
        $event = Events::findOrFail($id);
        return view('Events.edit', compact('event', 'games', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request['user_id'] = Auth::user()->id_user;

        $this->validate($request, [
            "game_id" => "required",
            "user_id" => "required",
            "event_name" => "required",
            "event_image" => "required",
            "slot" => "required",
            "price" => "required",
            "pricepool" => "required",
            "isfree" => "required",
            "detail" => "required",
            "peraturan" => "required",
            "start" => "required",
            "end" => "required"
        ]);
        $event = Events::findOrFail($id)->update($request->all());
        if ($request->hasFile('event_image')) {
            $event = Events::findOrFail($id);
            $event->event_image = Upload::uploadFile($request, 'event_image');
            $event->save();
        }

        return redirect('anggota/events/events')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $event = Events::findOrFail($id);
        $event->delete();

        return redirect('anggota/events/events')->with('success', 'Data berhasil dihapus');
    }

    // ambil data event berdasarkan user login
    public function events()
    {
        $events = Events::where('user_id', auth()->user()->id_user)
            ->latest();
        // if has event search like
        if (request()->has('event')) {
            $events = $events->where('event_name', 'LIKE', '%' . request('event') . '%');
        }

        $events = $events->paginate(10);
        return view('Events.index', compact('events'));
    }

    public function setEvent($id)
    {
        $event_teams = Event_teams::join('events', 'event_teams.event_id', 'events.id_event')
            ->join('squads', 'event_teams.squad_id', 'squads.id_squad')
            ->select('event_teams.*', 'events.event_name', 'squads.squad_name')
            ->where('events.user_id', Auth::user()->id_user)
            ->where('event_teams.event_id', $id)
            ->latest();

        // if has event search like
        if (request()->has('event_team')) {
            $event_teams = $event_teams->where('events.event_name', 'LIKE', '%' . request('event_team') . '%')
                ->orWhere('squads.squad_name', 'LIKE', '%' . request('event_team') . '%');
        }

        $event_teams = $event_teams->paginate(10);

        $event_inv_teams = Event_inv_teams::join('squads', 'event_inv_teams.squad_id', 'squads.id_squad')
            ->join('events', 'event_inv_teams.event_id', 'events.id_event')
            ->select('event_inv_teams.*', 'squads.squad_name', 'events.event_name')
            ->where('events.user_id', Auth::user()->id_user)
            ->where('event_inv_teams.event_id', $id)
            ->latest();

        // if has event_inv_team search like
        if (request()->has('event_inv_team')) {
            $event_inv_teams = $event_inv_teams->where('events.event_name', 'LIKE', '%' . request('event_inv_team') . '%')
                ->orWhere('squads.squad_name', 'LIKE', '%' . request('event_inv_team') . '%');
        }

        $event_inv_teams = $event_inv_teams->paginate(10);

        $event_winner = Event_winner::join('events', 'event_winners.event_id', 'events.id_event')
            ->join('squads', 'event_winners.squad_id', 'squads.id_squad')
            ->select('event_winners.*', 'events.event_name', 'squads.squad_name')
            ->where('events.user_id', Auth::user()->id_user)
            ->latest();

        // if has event_winner search like
        if (request()->has('event_winner')) {
            $event_winner = $event_winner->where('events.event_name', 'LIKE', '%' . request('event_winner') . '%')
                ->orWhere('squads.squad_name', 'LIKE', '%' . request('event_winner') . '%');
        }

        $event_winner = $event_winner->paginate(10);

        return view('Events.setEvent', compact('event_teams', 'event_inv_teams', 'event_winner', 'id'));
    }

    public function joinEvent($id)
    {
        $squads = Squads::join('players', 'squads.id_squad', 'players.squad_id')
            ->select('squads.*')
            ->where('players.user_id', Auth::user()->id_user)
            ->distinct()
            ->get();


        $event = Events::findOrFail($id);

        return view('Events.joinEvent', compact('event', 'squads'));
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
            return redirect('anggota/events/followEvent')->with('event_teams', 'Squad already in event.');
        } else {
            // if has paid_image
            $event = Event_teams::create($request->all());
            if ($request->hasFile('paid_image')) {
                $event->paid_image = Upload::uploadFile($request, 'paid_image');
                $event->save();
            }
            return redirect('anggota/events/followEvent')->with('event_teams', 'Join event successfully.');
        }
    }

    public function editJoin($id)
    {
        $event_teams = Event_teams::join('events', 'event_teams.event_id', 'events.id_event')
            ->join('squads', 'event_teams.squad_id', 'squads.id_squad')
            ->select('event_teams.*', 'events.event_name', 'squads.squad_name')
            ->find($id);

        return view('Events.joinEdit', compact('event_teams'));
    }

    // updateJoin
    public function updateJoin(Request $request, $id)
    {
        $request['ispaid'] = 0;
        $this->validate($request, [
            "event_id" => "required",
            "squad_id" => "required",
            "ispaid" => "required",
        ]);

        $event = Event_teams::findOrFail($id)->update($request->all());
        if ($request->hasFile('paid_image')) {
            $image = Upload::uploadFile($request, 'paid_image');
            $event = Event_teams::findOrFail($id);
            $event->paid_image = $image;
            $event->save();
        }
        return redirect('anggota/events/followEvent')->with('event_teams', 'Join event successfully.');
    }

    public function followEvent()
    {
        // get squad by players
        $squads = Squads::join('players', 'squads.id_squad', 'players.squad_id')
            ->select('squads.id_squad')
            ->where('players.user_id', Auth::user()->id_user)
            ->distinct()
            ->get();
        //   join event_teams with squads
        $event_teams = Events::join('event_teams', 'events.id_event', 'event_teams.event_id')
            ->join('squads', 'event_teams.squad_id', 'squads.id_squad')
            ->whereIn('squads.id_squad', $squads->pluck('id_squad'))
            ->select('events.*', 'event_teams.*', 'squads.*')
            ->latest();

        // if has event search like 
        if (request()->has('event')) {
            $event_teams = $event_teams->where('events.event_name', 'LIKE', '%' . request('event') . '%');
        }

        $event_teams = $event_teams->paginate(10);
        return view('Events.follow', compact('event_teams'));
    }
}
