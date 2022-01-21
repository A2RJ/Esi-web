<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Users;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_role' => ['required'],
            'uuid' => ['nullable'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // email_checker
            'fb' => ['nullable'],
            'ig' => ['nullable'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            "kontak" => ['required', 'numeric'],
            "alamat" => ['required'],
            "province" => ['required'],
            "regency" => ['required'],
            "district" => ['required'],
            "village" => ['required'],
            "kota" => ['nullable'],
            "gender" => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return Users::create([
            'user_role' => $data['user_role'],
            'uuid' => date('YmdHis') . Users::latest()->first()->id_user + 1,
            'nama' => $data['nama'],
            'email' => $data['email'],
            'fb' => null,
            'ig' => null,
            'password' => Hash::make($data['password']),
            'kontak' => $data['kontak'],
            'alamat' => $data['alamat'],
            'province' => $data['province'],
            'regency' => $data['regency'],
            'district' => $data['district'],
            'village' => $data['village'],
            'kartu_identitas' => null,
            'gender' => $data['gender'],
            'user_image' => 'Group115.svg'
        ]);
    }
}
