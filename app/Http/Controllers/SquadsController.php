<?php

namespace App\Http\Controllers;

use App\Classes\Upload;
use App\Models\Games;
use App\Models\Players;
use App\Models\Squads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SquadsController extends Controller
{
    public function index()
    {
        $squads = Squads::with('game', 'leader', 'players', 'management')
            ->paginate(10);

        return view('squads.index', compact('squads'));
    }

    public function create()
    {
        $games = Games::all();
        $players = Players::where('user_id', Auth::user()->id_user)->get();
        return view('squads.create', compact('players', 'games'));
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
        return view('squads.detail', compact('squad'));
    }

    public function edit($id)
    {
        $games = Games::all();
        $squad = Squads::find($id);
        $players = Players::where('user_id', Auth::user()->id_user)->get();
        return view('squads.edit', compact('squad', 'players', 'games'));
    }

    public function update(Request $request, $id)
    {
        $squad = Squads::find($id)->update($request->all());
        if($request->hasFile('squad_image')) {
            $squad = Squads::find($id);
            $squad->squad_image = Upload::uploadFile($request, 'squad_image');
            $squad->save();
        }
        Players::where('id_player', $request->squad_leader)->update(['squad_id' => $squad->id_squad]);

        if (Auth::user()->user_role !== 'admin') return redirect('squads/squads')->with('success', 'Squad created successfully');
        return redirect('squads')->with('success', 'Squad updated successfully');
    }

    public function destroy($id)
    {
        Squads::find($id)->delete();

        if (Auth::user()->user_role !== 'admin') return redirect('squads/squads')->with('success', 'Squad created successfully');
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
}
