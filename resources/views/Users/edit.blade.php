@extends('layouts.dashboard')
@section('title', 'users')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New users</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/users" title="Go back"> Batal </a>
                </p> -->

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="/users/update/{{$user->id_user}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="user_role">Type Akun</label>
                            @if(auth()->user()->user_role == 'player' || auth()->user()->user_role == 'management')
                            <input class="form-control" name="user_role" id="user_role" type="text" placeholder="{{ $user->user_role }}" value="{{ $user->user_role }}" readonly>
                            @else
                            <select name="user_role" id="user_role" class="form-control">
                                <option value="player" {{$user->user_role == 'player' ? 'selected' : ''}}>Player</option>
                                <option value="management" {{$user->user_role == 'management' ? 'selected' : ''}}>Management</option>
                                <option value="admin" {{$user->user_role == 'admin' ? 'selected' : ''}}>Admin</option>
                            </select>
                            @endif
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="nama">Nama</label>
                            <input class="form-control" name="nama" id="nama" type="text" placeholder="{{ $user->nama }}" value="{{ $user->nama }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email">Email</label>
                            <input class="form-control" name="email" id="email" type="text" placeholder="{{ $user->email }}" value="{{ $user->email }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="password">Password</label>
                            <input class="form-control" name="password2" id="password2" type="text" placeholder="Optional">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="kontak">Kontak</label>
                            <input class="form-control" name="kontak" id="kontak" type="text" placeholder="{{ $user->kontak }}" value="{{ $user->kontak }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="alamat">Alamat</label>
                            <input class="form-control" name="alamat" id="alamat" type="text" placeholder="{{ $user->alamat }}" value="{{ $user->alamat }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="exampleFormControlSelect1">
                                <option value="p" {{$user->gender == 'p' ? 'selected' : ''}}>Perempuan</option>
                                <option value="l" {{$user->gender == 'l' ? 'selected' : ''}}>Laki-Laki</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="user_image">User Image</label>
                            <input class="form-control" name="user_image" id="user_image" type="file" placeholder="{{ $user->user_image }}" value="{{ $user->user_image }}">
                        </div>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection