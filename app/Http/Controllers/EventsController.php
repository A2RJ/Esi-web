<?php

namespace App\Http\Controllers;

use App\Classes\Upload;
use App\Models\Event_teams;
use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Games;
use App\Models\Squads;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::with('owner', 'game')
            ->paginate(10);

        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        $event = Events::join('games', 'events.game_id', 'games.id_game')
            ->with('owner')
            ->findOrFail($id);
        $teams = Event_teams::join('squads', 'event_teams.squad_id', 'squads.id_squad')
            ->where('event_teams.event_id', $id)
            ->get();

        return view('events.show', compact('event', 'teams'));
    }

    public function create()
    {
        $games = Games::all();
        $users = Users::all();
        return view('events.create', compact('games', 'users'));
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
        
        if (Auth::user()->user_role !== 'admin') return redirect('events/events')->with('success', 'Event created successfully');
        return redirect('/events')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $games = Games::all();
        $users = Users::all();
        $event = Events::findOrFail($id);
        return view('events.edit', compact('event', 'games', 'users'));
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
            "pricepool" => "required",
            "isfree" => "required",
            "detail" => "required",
            "peraturan" => "required",
            "start" => "required",
            "end" => "required"
        ]);
        $event = Events::findOrFail($id)->update($request->all());
        if($request->hasFile('event_image')){
            $event->event_image = Upload::uploadFile($request, 'event_image');
            $event->save();
        }

        if (Auth::user()->user_role !== 'admin') return redirect('events/events')->with('success', 'Event created successfully');
        return redirect('/events')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $event = Events::findOrFail($id);
        $event->delete();

        if (Auth::user()->user_role !== 'admin') return redirect('events/events')->with('success', 'Event created successfully');
        return redirect('/events')->with('success', 'Data berhasil dihapus');
    }

    // ambil data event berdasarkan user login
    public function events()
    {
        $events = Events::where('user_id', auth()->user()->id_user)
            ->paginate(10);
        return view('events.index', compact('events'));
    }
}
