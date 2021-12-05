<?php

namespace App\Http\Controllers;

use App\Models\Squad_inv_players;
use Illuminate\Http\Request;

class Squad_inv_playersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $squad_inv_players = Squad_inv_players::all();
        return view('squad_inv_players.index', compact('squad_inv_players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('squad_inv_players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'player_id' => 'required',
            'squad_id' => 'required',
            'position' => 'required',
            'status' => 'required',
        ]);
        Squad_inv_players::create($request->all());
        return redirect()->route('squad_inv_players.index')
                        ->with('success','Squad_inv_players created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Squad_inv_players  $squad_inv_players
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $squad_inv_players = Squad_inv_players::find($id);
        return view('squad_inv_players.show',compact('squad_inv_players'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Squad_inv_players  $squad_inv_players
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $squad_inv_players = Squad_inv_players::find($id);
        return view('squad_inv_players.edit',compact('squad_inv_players'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Squad_inv_players  $squad_inv_players
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'player_id' => 'required',
            'squad_id' => 'required',
            'position' => 'required',
            'status' => 'required',
        ]);
        Squad_inv_players::find($id)->update($request->all());
        return redirect()->route('squad_inv_players.index')
                        ->with('success','Squad_inv_players updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Squad_inv_players  $squad_inv_players
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Squad_inv_players::find($id)->delete();
        return redirect()->route('squad_inv_players.index')
                        ->with('success','Squad_inv_players deleted successfully');
    }
}
