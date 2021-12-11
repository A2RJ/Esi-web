<?php

namespace App\Http\Controllers;

use App\Models\Players;
use App\Models\Squads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SquadsController extends Controller
{
    public function index()
    {
        $squads = Squads::join('players', 'squads.id_squad', 'players.squad_id')
            ->select('squads.*', 'players.ingame_name')
            ->distinct()
            ->paginate(10);
        return view('squads.index', compact('squads'));
    }

    public function create()
    {
        $players = Players::where('user_id', Auth::user()->id_user)->get();
        return view('squads.create', compact('players'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "squad_name" => "required",
            "squad_leader" => "required",
        ]);

        $squad = Squads::create($request->all());
        Players::where('id_player', $request->squad_leader)->update(['squad_id' => $squad->id_squad]);
        return redirect('squads')->with('success', 'Squad created successfully');
    }

    public function show($id)
    {
        $squad = Squads::find($id);
        return view('squads.show', compact('squad'));
    }

    public function edit($id)
    {
        $players = Players::where('user_id', Auth::user()->id_user)->get();
        $squad = Squads::find($id);
        return view('squads.edit', compact('squad', 'players'));
    }

    public function update(Request $request, $id)
    {
        $squad = Squads::find($id)->update($request->all());
        Players::where('id_player', $request->squad_leader)->update(['squad_id' => $squad->id_squad]);
        return redirect('squads')->with('success', 'Squad updated successfully');
    }

    public function destroy($id)
    {
        Squads::find($id)->delete();
        return redirect('squads')->with('success', 'Squad deleted successfully');
    }

    // ambil data squad berdasarkan user login
    public function squads()
    {
        $squads = Squads::join('players', 'squads.id_squad', 'players.squad_id')
            ->where('players.user_id', auth()->user()->id_user)
            ->select('squads.*', 'players.ingame_name')
            ->with('leader', 'management')
            ->paginate(10);
            
        return view('squads.index', compact('squads'));
    }

    public function squadDetail($id)
    {
        $squads = Squads::join('players', 'squads.id_squad', 'players.squad_id')
            ->join('managements', 'squads.management_id', 'managements.id_management')
            ->select('squads.*', 'players.ingame_name', 'managements.management_name')
            ->with('players')
            ->find($id)
            ->paginate(10);
        return $squads;
        return view('squads.index', compact('squads'));
    }
}
