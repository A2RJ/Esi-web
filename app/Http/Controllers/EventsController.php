<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Games;
use App\Models\Squads;
use App\Models\Users;

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
        return view('events.show', compact('event'));
    }

    public function create()
    {
        $games = Games::all();
        $users = Users::all();
        return view('events.create', compact('games', 'users'));
    }

    public function store(Request $request)
    {
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
        Events::create($request->all());
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
        Events::findOrFail($id)->update($request->all());
        return redirect('/events')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $event = Events::findOrFail($id);
        $event->delete();
        return redirect('/events')->with('success', 'Data berhasil dihapus');
    }
}
