<?php

namespace App\Http\Controllers;

use App\Models\Managements;
use App\Models\Request_managements;
use App\Models\Squads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Request_managementsController extends Controller
{
    public function index()
    {
        $request_managements = Request_managements::join('squads', 'request_managements.squad_id', 'squads.id_squad')
            ->join('managements', 'request_managements.management_id', 'managements.id_management')
            ->join('players', 'squads.squad_leader', 'players.id_player')
            ->where('players.user_id', Auth::user()->id_user)
            ->select('request_managements.*', 'squads.squad_name', 'managements.management_name')
            ->latest();

        if (request()->has('request_management')) {
            $request_managements->where('squads.squad_name', 'LIKE', '%' . request('request_management') . '%')
                ->orWhere('managements.management_name', 'LIKE', '%' . request('request_management') . '%');
        }

        $request_managements = $request_managements->paginate(10);
        return view('Request_managements.index', compact('request_managements'));
    }

    public function create()
    {
        $managements  = Managements::all();
        $squads = Squads::join('players', 'squads.id_squad', 'players.squad_id')
            ->where('players.user_id', Auth::user()->id_user)
            ->select('squads.*')
            ->distinct()
            ->get();

        return view('Request_managements.create', compact('squads', 'managements'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'squad_id' => 'required',
            'management_id' => 'required'
        ]);

        Request_managements::create($request->all());

        return redirect('/request_managements')->with('success', 'Request_managements created successfully');
    }

    public function show($id)
    {
        $request_managements = Request_managements::find($id);
        return view('Request_managements.show', compact('request_managements'));
    }

    public function edit($id)
    {
        $request_managements = Request_managements::find($id);
        return view('Request_managements.edit', compact('request_managements'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'squad_id' => 'required',
            'management_id' => 'required'
        ]);

        Request_managements::find($id)->update($request->all());

        return redirect('/request_managements')->with('success', 'Request_managements updated successfully');
    }

    public function destroy($id)
    {
        Request_managements::find($id)->delete();
        return redirect('/request_managements')->with('success', 'Request_managements deleted successfully');
    }

    // requestFromSquads
    public function requestFromSquads()
    {
        $request_managements = Request_managements::join('managements', 'request_managements.management_id', 'managements.id_management')
            ->where('managements.user_id', Auth::user()->id_user)
            ->select('request_managements.*')
            ->with('squad', 'management')
            ->latest();

        if (request()->has('request_management')) {
            $request_managements->where('managements.management_name', 'LIKE', '%' . request('request_management') . '%');
        }
        
        $request_managements = $request_managements->paginate(10);
        return view('Request_managements.requestFromSquads', compact('request_managements'));
    }

    // terima
    public function terima($id)
    {
        $request_managements = Request_managements::find($id);
        Squads::find($request_managements->squad_id)->update(['management_id' => $request_managements->management_id]);
        $request_managements->status = 1;
        $request_managements->save();

        return redirect('/request_managements/requestFromSquads');
    }
}
