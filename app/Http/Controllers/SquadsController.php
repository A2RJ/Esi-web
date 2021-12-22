<?php

namespace App\Http\Controllers;

use App\Classes\Upload;
use App\Models\Games;
use App\Models\Players;
use App\Models\Request_squads;
use App\Models\Squad_inv_players;
use App\Models\Squads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SquadsController extends Controller
{
    public function index()
    {
        $squads = Squads::with('game', 'leader', 'players', 'management')
            ->paginate(10);

        return view('Squads.index', compact('squads'));
    }

    public function create()
    {
        $games = Games::all();
        $players = Players::where('user_id', Auth::user()->id_user)->where('squad_id', null)->get();
        return view('Squads.create', compact('players', 'games'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "game_id" => "required",
            "squad_name" => "required|unique:squads",
            "squad_leader" => "required",
        ]);

        $squad = Squads::create($request->all());
        $squad->squad_image = Upload::uploadFile($request, 'squad_image');
        $squad->save();

        Players::where('id_player', $request->squad_leader)->update(['squad_id' => $squad->id_squad]);

        if (Auth::user()->user_role !== 'admin') return redirect('squads/squads')->with('success', 'Squad created successfully');
        return redirect('squads')->with('success', 'Squad created successfully');
    }

    public function show($id)
    {
        $games = Games::all();
        $squad = Squads::find($id);
        return view('Squads.detail', compact('squad'));
    }

    public function edit($id)
    {
        $games = Games::all();
        $squad = Squads::find($id);
        $player = Players::find($squad->squad_leader);
        $players = Players::where('user_id', Auth::user()->id_user)->where('squad_id', null)->get();
        return view('Squads.edit', compact('squad', 'player', 'players', 'games'));
    }

    public function update(Request $request, $id)
    {
        $squad = Squads::find($id)->update($request->all());

        if ($request->hasFile('squad_image')) {
            $squad = Squads::find($id);
            $squad->squad_image = Upload::uploadFile($request, 'squad_image');
            $squad->save();
        }
        Players::where('id_player', $request->squad_leader)->update(['squad_id' => $id]);

        if (Auth::user()->user_role !== 'admin') return redirect('squads/squads')->with('success', 'Squad created successfully');
        return redirect('squads')->with('success', 'Squad updated successfully');
    }

    public function destroy($id)
    {
        Squads::find($id)->delete();
        Players::where('squad_id', $id)->update(['squad_id' => null]);
        return redirect(url()->previous())->with('success', 'Squad deleted successfully');
    }

    // ambil data squad berdasarkan user login
    public function squads()
    {
        $player = Players::where('user_id', Auth::user()->id_user)->get();
        $squads = Squads::whereIn('squad_leader', $player->pluck('id_player'))
            ->with('leader', 'management')
            ->paginate(10);

        return view('Squads.index', compact('squads'));
    }

    public function setSquad($id)
    {
        $players = Players::with('user', 'game', 'squad')
            ->where('squad_id', $id)
            ->paginate(10);

        $squad_inv_players = Squad_inv_players::join('players', 'squad_inv_players.player_id', 'players.id_player')
            ->join('squads', 'squad_inv_players.squad_id', 'squads.id_squad')
            ->where('squad_inv_players.squad_id', $id)
            ->select('squad_inv_players.*', 'players.ingame_name', 'squads.squad_name')
            ->paginate(10);

        $request_squads = Request_squads::join('squads', 'request_squads.squad_id', 'squads.id_squad')
            ->join('players', 'request_squads.player_id', 'players.id_player')
            ->where('request_squads.squad_id', $id)
            ->select('request_squads.*', 'squads.squad_name', 'players.ingame_name')
            ->paginate(10);

        return view('Squads.show', compact('id', 'players', 'squad_inv_players', 'request_squads'));
    }

    public function destroyFromSquad($id)
    {
        Players::find($id)->update(['squad_id' => null]);
        return redirect(url()->previous())->with('deleteFromSquad', 'Player has been removed from squad');
    }
}
