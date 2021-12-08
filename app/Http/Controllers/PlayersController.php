<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Players;
use App\Models\Squads;
use App\Models\Users;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function index()
    {
        $players = Players::with('user', 'game', 'squad')
            ->paginate(10);
        return view('players.index', compact('players'));
    }

    public function create()
    {
        $users = Users::all();
        $games = Games::all();
        $squads = Squads::all();
        return view('players.create', compact('users', 'games', 'squads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "user_id" => "required",
            "squad_id" => "required",
            "game_id" => "required",
            "ingame_name" => "required",
            "ingame_id" => "required",
            "player_image" => "required",
        ]);

        Players::create($request->all());
        return redirect('/players')->with('success', 'Player has been added');
    }

    public function show($id)
    {
        $players = Players::find($id);
        return view('players.show', compact('players'));
    }

    public function account($id)
    {
        $players = Players::where('user_id', $id)->paginate(10);
        return view('players.account', compact('players'));
    }

    public function edit($id)
    {
        $users = Users::all();
        $games = Games::all();
        $squads = Squads::all();
        $players = Players::find($id);
        return view('players.edit', compact('players', 'users', 'games', 'squads'));
    }

    public function update(Request $request, $id)
    {
        Players::find($id)->update($request->all());
        return redirect('/players')->with('success', 'Player has been updated');
    }

    public function destroy($id)
    {
        Players::find($id)->delete();
        return redirect('/players')->with('success', 'Player has been deleted');
    }
}
