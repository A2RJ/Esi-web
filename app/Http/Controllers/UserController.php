<?php

namespace App\Http\Controllers;

use App\Classes\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest();
        if(request('user')){
            $users = $users->where('nama', 'like', '%' . request('user') . '%');
        }
        $users = $users->paginate(10);
        return view('Users.index', compact('users'));
    }
    public function show($id)
    {
        $user = User::find($id);
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
            "password" => "required",
            "kontak" => "required",
            "alamat" => "required",
            "gender" => "required",
            "user_image" => "required",
        ]);
        $user  = User::create($request->all());
        $user->user_image = Upload::uploadFile($request, 'user_image');
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('users')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('Users.edit', compact('user'));
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('Users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "user_role" => "required",
            "nama" => "required",
            "email" => "required",
            "password" => "nullable",
            "kontak" => "required",
            "alamat" => "required",
            "gender" => "required",
            "user_image" => "required",
        ]);


        if ($request->password2 !== '') {
            $request['password'] = Hash::make($request->password2);
        }
        $user = User::find($id);
        $update = $user;
        $user->update($request->all());
        if ($request->hasFile('user_image')) {
            $update->user_image = Upload::uploadFile($request, 'user_image');
            $user->save();
        }
        return redirect(url()->previous())->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect('/users')->with('success', 'User deleted successfully');
    }
}
