<?php

namespace App\Http\Controllers;

use App\Models\Managements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagementsController extends Controller
{
    public function index()
    {
        $managements = Managements::paginate(10);
        return view('managements.index', compact('managements'));
    }

    public function create()
    {
        $managements = Managements::paginate(10);
        return view('managements.create', compact('managements'));
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
        Managements::create($request->all());
        if (Auth::user()->user_role == 'management') return redirect('/managements/managements')->with('success', 'Management created successfully.');
        return redirect('managements')->with('success', 'Management created successfully.');
    }

    public function show($id)
    {
        $management = Managements::find($id);
        return view('managements.show', compact('management'));
    }

    public function edit($id)
    {
        $management = Managements::find($id);
        return view('managements.edit', compact('management'));
    }

    public function update(Request $request, $id)
    {
        Managements::find($id)->update($request->all());
        
        if (Auth::user()->user_role == 'management') return redirect('/managements/managements')->with('success', 'Management created successfully.');
        return redirect('managements')->with('success', 'Management updated successfully.');
    }

    public function destroy($id)
    {
        Managements::find($id)->delete();

        if (Auth::user()->user_role == 'management') return redirect('/managements/managements')->with('success', 'Management created successfully.');
        return redirect('managements')->with('success', 'Management deleted successfully.');
    }

    // ambil management berdasarkan user login
    public function managements()
    {
        $managements = Managements::where('user_id', Auth::user()->id_user)->paginate(10);
        return view('managements.index', compact('managements'));
    }
}
