<?php

namespace App\Http\Controllers;

use App\Models\Managements;
use Illuminate\Http\Request;

class ManagementsController extends Controller
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
        $managements = Managements::all();
        return view('managements.create', compact('managements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([]);
        Managements::create($request->all());
        return redirect()->route('managements.create')->with('success', 'Management created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Managements  $managements
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $management = Managements::find($id);
        return view('managements.show', compact('management'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Managements  $managements
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $management = Managements::find($id);
        return view('managements.edit', compact('management'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Managements  $managements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([]);
        $management = Managements::find($id)->update($request->all());
        return redirect()->route('managements.edit', $management->id)->with('success', 'Management updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Managements  $managements
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Managements::find($id)->delete();
        return redirect()->route('managements.create')->with('success', 'Management deleted successfully.');
    }
}
