<?php

namespace App\Http\Controllers;

use App\Models\Management_inv_squads;
use App\Models\Managements;
use App\Models\Squads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Management_inv_squadsController extends Controller
{
    public function index()
    {
        $management_inv_squads = Management_inv_squads::join('squads', 'management_inv_squads.squad_id', 'squads.id_squad')
            ->join('managements', 'management_inv_squads.management_id', 'managements.id_management')
            ->where('managements.user_id', Auth::user()->id_user)
            ->paginate(10);

        return view('management_inv_squads.index', compact('management_inv_squads'));
    }

    public function create()
    {
        $squads = Squads::all();
        $managements = Managements::where('user_id', Auth::user()->id_user)->get();

        return view('management_inv_squads.create', compact('squads', 'managements'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "management_id" => "required",
            "squad_id" => "required",
        ]);
        Management_inv_squads::create($request->all());

        return redirect('management_inv_squads')->with('success', 'Management_inv_squads created successfully');
    }

    public function show($id)
    {
        $management_inv_squads = Management_inv_squads::find($id);
        return view('management_inv_squads.show', compact('management_inv_squads'));
    }

    public function edit($id)
    {
        $squads = Squads::all();
        $management_inv_squads = Management_inv_squads::find($id);
        return view('management_inv_squads.edit', compact('management_inv_squads', 'squads'));
    }

    public function update(Request $request, $id)
    {
        Management_inv_squads::find($id)->update($request->all());
        return redirect('management_inv_squads')->with('success', 'Management_inv_squads updated successfully');
    }

    public function destroy($id)
    {
        Management_inv_squads::find($id)->delete();
        return redirect('management_inv_squads')->with('success', 'Management_inv_squads deleted successfully');
    }

    public function invite()
    {
        $management_inv_squads = Management_inv_squads::join('squads', 'management_inv_squads.squad_id', 'squads.id_squad')
            ->join('managements', 'management_inv_squads.management_id', 'managements.id_management')
            ->join('players', 'players.squad_id', 'squads.id_squad')
            ->where('players.user_id', Auth::user()->id_user)
            ->paginate(10);
        return view('management_inv_squads.invite', compact('management_inv_squads'));
    }

    public function terima($id)
    {
        $management_inv_squads = Management_inv_squads::find($id);
        Squads::find($management_inv_squads->squad_id)->update(['management_id' => $management_inv_squads->management_id]);
        $management_inv_squads->status = 1;
        $management_inv_squads->save();

        return redirect('management_inv_squads/invite')->with('success', 'Management_inv_squads updated successfully');
    }
}
