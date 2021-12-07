<?php

namespace App\Http\Controllers;

use App\Models\Management_inv_squads;
use App\Models\Squads;
use Illuminate\Http\Request;

class Management_inv_squadsController extends Controller
{
    public function index()
    {
        $management_inv_squads = Management_inv_squads::with('squad')
            ->paginate(10);
        return view('management_inv_squads.index', compact('management_inv_squads'));
    }

    public function create()
    {
        $squads = Squads::all();
        return view('management_inv_squads.create', compact('squads'));
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

    // get management_inv_squads by squad_id
    public function getManagementInvSquadsBySquadId($id)
    {
        return Management_inv_squads::where('squad_id', $id)->where('status', false)->get();
    }

    // accept management_inv_squads
    public function acceptManagementInvSquads($id_management, $id_squad)
    {
        Management_inv_squads::find($id_management)->update(['status' => true]);
        Squads::find($id_squad)->update(['management_id' => $id_management]);
        return true;
    }

    // decline management_inv_squads
    public function declineManagementInvSquads($id_management, $id_squad)
    {
        Management_inv_squads::find($id_management)->update(['status' => false]);
        Squads::find($id_squad)->update(['management_id' => null]);
        return true;
    }
}
