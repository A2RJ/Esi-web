<?php

namespace App\Http\Controllers;

use App\Models\Squads;
use Illuminate\Http\Request;

class SquadsController extends Controller
{
    public function index()
    {
        $squads = Squads::paginate(10);
        return view('squads.index', compact('squads'));
    }

    public function create()
    {
        return view('squads.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "id_squad" => "required",
            "squad_name" => "required",
            "squad_leader" => "required",
            "management_id" => "required",
        ]);

        Squads::create($request->all());
        return redirect('squads')->with('success', 'Squad created successfully');
    }

    public function show($id)
    {
        $squad = Squads::find($id);
        return view('squads.show', compact('squad'));
    }

    public function edit($id)
    {
        $squad = Squads::find($id);
        return view('squads.edit', compact('squad'));
    }

    public function update(Request $request, $id)
    {
        Squads::find($id)->update($request->all());
        return redirect('squads')->with('success', 'Squad updated successfully');
    }

    public function destroy($id)
    {
        Squads::find($id)->delete();
        return redirect('squads')->with('success', 'Squad deleted successfully');
    }
}
