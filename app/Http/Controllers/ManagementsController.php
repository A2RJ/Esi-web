<?php

namespace App\Http\Controllers;

use App\Classes\Upload;
use App\Models\Managements;
use App\Models\Squads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagementsController extends Controller
{
    public function index()
    {
        $managements = Managements::latest();

        if (request()->has('management')) {
            $managements = $managements->where('management_name', 'LIKE', '%' . request()->management . '%');
        }

        $managements = $managements->paginate(10);
        return view('Managements.index', compact('managements'));
    }

    public function create()
    {
        $managements = Managements::paginate(10);
        return view('Managements.create', compact('managements'));
    }

    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id_user;
        $this->validate($request, [
            "user_id" => "required",
            "management_name" => "required",
            "management_image" => "required",
            "kontak" => "required",
            "web_url" => "required",
            "alamat" => "required",
        ]);
        $management = Managements::create($request->all());
        $management->management_image = Upload::uploadFile($request, 'management_image');
        $management->save();

        return redirect('anggota/managements/managements')->with('success', 'Management created successfully.');
    }

    public function show($id)
    {
        $management = Managements::find($id);
        return view('Managements.detail', compact('management'));
    }

    public function edit($id)
    {
        $management = Managements::find($id);
        return view('Managements.edit', compact('management'));
    }

    public function update(Request $request, $id)
    {
        $management = Managements::find($id)->update($request->all());
        if($request->hasFile('management_image')){
            $management = Managements::find($id);
            $management->management_image = Upload::uploadFile($request, 'management_image');
            $management->save();
        }
        
        return redirect('anggota/managements/managements')->with('success', 'Management updated successfully.');
    }

    public function destroy($id)
    {
        Managements::find($id)->delete();
        Squads::where('management_id', $id)->update(['management_id' => $id]);

        return redirect('anggota/managements/managements')->with('success', 'Management deleted successfully.');
    }

    public function managements()
    {
        $managements = Managements::where('user_id', Auth::user()->id_user)->latest();
        
        if (request()->has('management')) {
            $managements = $managements->where('management_name', 'LIKE', '%' . request()->management . '%');
        }

        $managements = $managements->paginate(10);
        return view('Managements.index', compact('managements'));
    }
}
