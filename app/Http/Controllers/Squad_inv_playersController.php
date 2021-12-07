<?php

namespace App\Http\Controllers;

use App\Models\Players;
use App\Models\Squad_inv_players;
use Illuminate\Http\Request;

class Squad_inv_playersController extends Controller
{
    public function index()
    {
        $squad_inv_players = Squad_inv_players::paginate(10);
        return view('squad_inv_players.index', compact('squad_inv_players'));
    }

    public function create()
    {
        return view('squad_inv_players.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "id_squad_inv_player" => "required",
            "squad_id" => "required",
            "player_id" => "required",
            "status" => "required",
        ]);
        Squad_inv_players::create($request->all());
        return redirect('squad_inv_players')->with('success', 'Squad_inv_players created successfully');
    }

    public function show($id)
    {
        $squad_inv_players = Squad_inv_players::find($id);
        return view('squad_inv_players.show', compact('squad_inv_players'));
    }

    public function edit($id)
    {
        $squad_inv_players = Squad_inv_players::find($id);
        return view('squad_inv_players.edit', compact('squad_inv_players'));
    }

    public function update(Request $request, $id)
    {
        Squad_inv_players::find($id)->update($request->all());
        return redirect('squad_inv_players')->with('success', 'Squad_inv_players updated successfully');
    }

    public function destroy($id)
    {
        Squad_inv_players::find($id)->delete();
        return redirect('squad_inv_players')->with('success', 'Squad_inv_players deleted successfully');
    }

    // get squad_inv_players by player_id
    public function getSquadInvPlayersByPlayerId($id)
    {
        return Squad_inv_players::where('player_id', $id)->get();
    }

    // accept squad_inv_players
    public function acceptSquadInvPlayers($id_squad, $id_player)
    {
        Squad_inv_players::find($id_squad)->update(['status' => true]);
        Players::find($id_player)->update(['squad_id' => $id_squad]);
        return true;
    }

    // decline squad_inv_players
    public function declineSquadInvPlayers($id_squad, $id_player)
    {
        Squad_inv_players::find($id_squad)->update(['status' => false]);
        Players::find($id_player)->update(['squad_id' => null]);
        return true;
    }
}
