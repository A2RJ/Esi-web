<?php

namespace App\Http\Controllers;

use App\Models\Players;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Players::all();
        return view('players.create', compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "id_player" => "required",
            "user_id" => "required",
            "squad_id" => "required",
            "ingame_name" => "required",
            "ingame_id" => "required",
            "player_image" => "required",
        ]);

        Players::create($request->all());
        return redirect('/players/create')->with('success', 'Player has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $players = Players::find($id);
        return view('players.show', compact('players'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $players = Players::find($id);
        return view('players.edit', compact('players'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Players::find($id)->update($request->all());
        return redirect('/players/create')->with('success', 'Player has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Players::find($id)->delete();
        return redirect('/players/create')->with('success', 'Player has been deleted');
    }
}
