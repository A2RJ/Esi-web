<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
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
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('users')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id)->update($request->all());
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }
        return redirect('/users')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect('/users')->with('success', 'User deleted successfully');
    }
}
