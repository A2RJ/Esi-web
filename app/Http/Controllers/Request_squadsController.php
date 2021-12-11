<?php

namespace App\Http\Controllers;

use App\Models\Players;
use App\Models\Request_squads;
use App\Models\Squads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Request_squadsController extends Controller
{

    public function index()
    {
        $request_squads = Request_squads::with('squads', 'players')
            ->paginate(10);
        return view('request_squads.index', compact('request_squads'));
    }


    public function create()
    {
        $players = Players::where('user_id', Auth::user()->id_user)->get();
        $squads = Squads::all();
        return view('request_squads.create', compact('players', 'squads'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'player_id' => 'required',
            'squad_id' => 'required',
            'status' => 'required',
        ]);
        $player = Players::where('id_player', $request->player_id)
            ->select('squad_id')
            ->first();

        if ($player->squad_id) {
            return redirect('squad_inv_players/create')
                ->with('error', 'Player is already in a squad');
        }
        
        Request_squads::create($request->all());
        return redirect('request_squads')->with('success', 'Request_squads created successfully');
    }

    public function show($id)
    {
        $request_squads = Request_squads::findOrFail($id);
        return view('request_squads.show', compact('request_squads'));
    }

    public function edit($id)
    {
        $players = Players::where('user_id', Auth::user()->id_user)->get();
        $squads = Squads::all();
        $request_squads = Request_squads::findOrFail($id);
        return view('request_squads.edit', compact('request_squads', 'players', 'squads'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'player_id' => 'required',
            'squad_id' => 'required',
            'status' => 'required',
        ]);
        $player = Players::where('id_player', $request->player_id)
            ->select('squad_id')
            ->first();

        if ($player->squad_id) {
            return redirect('squad_inv_players/create')
                ->with('error', 'Player is already in a squad');
        }

        Request_squads::findOrFail($id)
            ->update($request->all());
        return redirect('request_squads')->with('success', 'Request_squads updated successfully');
    }

    public function destroy($id)
    {
        Request_squads::findOrFail($id)->delete();
        return redirect('request_squads')->with('success', 'Request_squads deleted successfully');
    }

    public function requestFromPlayers()
    {
        $request_squads = Request_squads::with('squads', 'players')
            ->paginate(10);
        return view('request_squads.request', compact('request_squads'));
    }

    public function terima($id)
    {
        $request_squads = Request_squads::findOrFail($id);
        Request_squads::findOrFail($id)->update(['status' => 1]);
        Players::where('id_player', $request_squads->player_id)->update(['squad_id' => $request_squads->squad_id]);

        return redirect('request_squads/requestFromPlayers')->with('success', 'Request_squads updated successfully');
    }
}
