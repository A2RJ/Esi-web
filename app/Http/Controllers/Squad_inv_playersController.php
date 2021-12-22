<?php

namespace App\Http\Controllers;

use App\Models\Players;
use App\Models\Squad_inv_players;
use App\Models\Squads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Squad_inv_playersController extends Controller
{
    public function index()
    {
        $squad_inv_players = Squad_inv_players::join('players', 'squad_inv_players.player_id', 'players.id_player')
            ->join('squads', 'squad_inv_players.squad_id', 'squads.id_squad')
            ->where('players.user_id', Auth::user()->id_user)
            ->select('squad_inv_players.*', 'players.ingame_name', 'squads.squad_name')
            ->paginate(10);

        return view('Squad_inv_players.index', compact('squad_inv_players'));
    }

    public function create($id)
    {
        $players = Players::where('squad_id', null)->get();
        $squad = Squads::join('players', 'squads.id_squad', 'players.squad_id')
            ->where('players.user_id', Auth::user()->id_user)
            ->select('squads.id_squad', 'squads.squad_name')
            ->find($id);
            
        return view('Squad_inv_players.create', compact('players', 'squad'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "squad_id" => "required",
            "player_id" => "required",
            "status" => "required",
        ]);

        $player = Players::where('id_player', $request->player_id)
            ->select('squad_id')
            ->first();

        if ($player->squad_id) {
            return redirect('squad_inv_players/create')
                ->with('error', 'Player is already in a squad');
        }

        Squad_inv_players::create($request->all());
        return redirect('squads/setSquad/' . $request->squad_id)->with('success', 'Squad_inv_players created successfully');
    }

    public function show($id)
    {
        $squad_inv_players = Squad_inv_players::find($id);
        return view('Squad_inv_players.show', compact('squad_inv_players'));
    }

    public function edit($id)
    {
        $squad_inv_players = Squad_inv_players::find($id);
        return view('Squad_inv_players.edit', compact('squad_inv_players'));
    }

    public function update(Request $request, $id)
    {
        $player = Players::where('id_player', $request->player_id)
            ->select('squad_id')
            ->first();

        if ($player->squad_id) {
            return redirect('squad_inv_players/create')
                ->with('error', 'Player is already in a squad');
        }

        Squad_inv_players::find($id)->update($request->all());
        return redirect('squad_inv_players')->with('success', 'Squad_inv_players updated successfully');
    }

    public function destroy($id)
    {
        Squad_inv_players::find($id)->delete();
        return redirect(url()->previous())->with('success', 'Squad_inv_players deleted successfully');
    }

    // invite from squad
    public function inviteFromSquad()
    {
        $squad_inv_players = Squad_inv_players::join('players', 'squad_inv_players.player_id', 'players.id_player')
            ->join('squads', 'squad_inv_players.squad_id', 'squads.id_squad')
            ->where('players.user_id', Auth::user()->id_user)
            ->select('squad_inv_players.*', 'players.ingame_name', 'squads.squad_name')
            ->paginate(10);

        return view('Squad_inv_players.invite', compact('squad_inv_players'));
    }

    public function terima($id)
    {
        $squad = Squad_inv_players::find($id);
        $squad1 = $squad;
        $squad1->update(['status' => 1]);

        Players::find($squad->player_id)->update(['squad_id' => $squad->squad_id]);

        return redirect('squad_inv_players')->with('success', 'Player has been added to squad');
    }
}
