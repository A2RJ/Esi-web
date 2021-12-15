<?php

namespace App\Http\Controllers;

use App\Classes\Upload;
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
        $management = Managements::create($request->all());
        $management->management_image = Upload::uploadFile($request, 'management_image');
        $management->save();

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
        $management = Managements::find($id)->update($request->all());
        if($request->hasFile('management_image')){
            $management->management_image = Upload::uploadFile($request, 'management_image');
            $management->save();
        }
        
        if (Auth::user()->user_role == 'management') return redirect('/managements/managements')->with('success', 'Management created successfully.');
        return redirect('managements')->with('success', 'Management updated successfully.');
    }

    public function destroy($id)
    {
        Managements::find($id)->delete();

        if (Auth::user()->user_role == 'management') return redirect('/managements/managements')->with('success', 'Management created successfully.');
        return redirect('managements')->with('success', 'Management deleted successfully.');
    }

    public function managements()
    {
        $managements = Managements::where('user_id', Auth::user()->id_user)->paginate(10);
        return view('managements.index', compact('managements'));
    }
}
