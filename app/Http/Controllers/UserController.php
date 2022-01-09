<?php

namespace App\Http\Controllers;

use App\Classes\Upload;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use WordTemplate;

class UserController extends Controller
{
    public function index()
    {
        $users = Users::latest();
        if (request('user')) {
            $users = $users->where('nama', 'LIKE', '%' . request('user') . '%')
                ->orWhere('user_role', 'LIKE', '%' . request('user') . '%');
        }
        $users = $users->paginate(10);
        return view('Users.index', compact('users'));
    }
    public function show($id)
    {
        $user = Users::find($id);
        return view('Users.show', compact('user'));
    }

    public function create()
    {
        return view('Users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "user_role" => "required",
            "nama" => "required",
            "email" => "required",
            "fb" => "nullable",
            "ig" => "nullable",
            "password" => "required",
            "kontak" => "required",
            "alamat" => "required",
            "kartu_identitas" => "nullable",
            "gender" => "required",
            "user_image" => "required",
        ]);
        $user  = Users::create($request->all());
        $user->user_image = Upload::uploadFile($request, 'user_image');
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/users')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = Users::find($id);
        return view('Users.edit', compact('user'));
    }

    public function profile($id)
    {
        $user = Users::find($id);
        return view('Users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "user_role" => "required",
            "nama" => "required",
            "email" => "required",
            "fb" => "nullable",
            "ig" => "nullable",
            "kontak" => "required",
            "alamat" => "required",
            "kartu_identitas" => "nullable",
            "gender" => "required",
            "user_image" => "nullable",
        ]);

        if ($request->password2) {
            $request['password'] = Hash::make($request->password2);
        }

        $user = Users::find($id);
        $update = $user;
        $user->update($request->all());

        if ($request->hasFile('user_image')) {
            $update->user_image = Upload::uploadFile($request, 'user_image');
            $user->save();
        }

        if ($request->has('kartu_identitas')) {
            $update->kartu_identitas = Upload::uploadFile($request, 'kartu_identitas');
            $user->save();
        }

        return redirect(url()->previous())->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = Users::find($id)->delete();
        return redirect('/users')->with('success', 'User deleted successfully');
    }

    // change text in trf file
    public function idcard()
    {
        if (Auth::user()->fb == null || Auth::user()->ig == null || Auth::user()->kartu_identitas == null) {
            return redirect(url()->previous())->with('error', 'Lengkapi data kartu identitas, facebook dan instagram');
        }
        $file = public_path('assets/idcard/idcard.rtf');

        $array = array(
            '#NAMA' => Auth::user()->nama,
            '#UUID' => Auth::user()->uuid,
            '#EMAIL' => Auth::user()->email,
            '#FB' => Auth::user()->fb,
            '#IG' => Auth::user()->ig,
            '#NOMOR' => Auth::user()->kontak,
        );

        $nama_file = 'idcard.doc';

        return WordTemplate::export($file, $array, $nama_file);
    }
}
