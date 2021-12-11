<?php

namespace App\Http\Controllers;

use App\Models\Request_squads;
use Illuminate\Http\Request;

class Request_squadsController extends Controller
{

    public function index()
    {
        $request_squads = Request_squads::paginate(10);
        return view('request_squads.index', compact('request_squads'));
    }


    public function create()
    {
        return view('request_squads.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'player_id' => 'required',
            'squad_id' => 'required',
            'status' => 'required',
        ]);

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
        $request_squads = Request_squads::findOrFail($id);
        return view('request_squads.edit', compact('request_squads'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'player_id' => 'required',
            'squad_id' => 'required',
            'status' => 'required',
        ]);

        Request_squads::findOrFail($id)
            ->update($request->all());
        return redirect('request_squads')->with('success', 'Request_squads updated successfully');
    }

    public function destroy($id)
    {
        Request_squads::findOrFail($id)->delete();
        return redirect('request_squads')->with('success', 'Request_squads deleted successfully');
    }

    public function requestFromSquads()
    {
        $request_squads = Request_squads::paginate(10);
        return view('request_squads.request', compact('request_squads'));
    }
}
