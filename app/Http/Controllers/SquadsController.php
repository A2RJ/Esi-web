<?php

namespace App\Http\Controllers;

use App\Models\Squads;
use Illuminate\Http\Request;

class SquadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $squads = Squads::all();
        return view('squads.index', compact('squads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('squads.create');
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
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        Squads::create($request->all());
        return redirect()->route('squads.index')->with('success', 'Squad created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Squads  $squads
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $squad = Squads::find($id);
        return view('squads.show', compact('squad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Squads  $squads
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $squad = Squads::find($id);
        return view('squads.edit', compact('squad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Squads  $squads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        Squads::find($id)->update($request->all());
        return redirect()->route('squads.index')->with('success', 'Squad updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Squads  $squads
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Squads::find($id)->delete();
        return redirect()->route('squads.index')->with('success', 'Squad deleted successfully');
    }
}
