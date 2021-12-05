<?php

namespace App\Http\Controllers;

use App\Models\Management_inv_squads;
use Illuminate\Http\Request;

class Management_inv_squadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $management_inv_squads = Management_inv_squads::all();
        return view('management_inv_squads.index', compact('management_inv_squads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management_inv_squads.create');
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
            'status' => 'required',
        ]);

        Management_inv_squads::create($request->all());
        return redirect()->route('management_inv_squads.index')
            ->with('success', 'Management_inv_squads created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Management_inv_squads  $management_inv_squads
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $management_inv_squads = Management_inv_squads::find($id);
        return view('management_inv_squads.show', compact('management_inv_squads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Management_inv_squads  $management_inv_squads
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $management_inv_squads = Management_inv_squads::find($id);
        return view('management_inv_squads.edit', compact('management_inv_squads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Management_inv_squads  $management_inv_squads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        Management_inv_squads::find($id)->update($request->all());
        return redirect()->route('management_inv_squads.index')
            ->with('success', 'Management_inv_squads updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Management_inv_squads  $management_inv_squads
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Management_inv_squads::find($id)->delete();
        return redirect()->route('management_inv_squads.index')
            ->with('success', 'Management_inv_squads deleted successfully');
    }
}
