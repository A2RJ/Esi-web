@extends('layouts.dashboard')
@section('title', 'users')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New users</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="/users" title="Go back"> Batal </a>
                </p>

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

                <form action="/users/update/{{$user->id_user}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="form-group">
                        <label for="user_role">user role</label>
                        <input class="form-control" name="user_role" id="user_role" type="text" placeholder="{{ $user->user_role }}" value="{{ $user->user_role }}">
                    </div>

                    <div class="form-group">
                        <label for="nama">nama</label>
                        <input class="form-control" name="nama" id="nama" type="text" placeholder="{{ $user->nama }}" value="{{ $user->nama }}">
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input class="form-control" name="email" id="email" type="text" placeholder="{{ $user->email }}" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="password">password</label>
                        <input class="form-control" name="password" id="password" type="text" placeholder="{{ $user->password }}" value="{{ $user->password }}">
                    </div>

                    <div class="form-group">
                        <label for="kontak">kontak</label>
                        <input class="form-control" name="kontak" id="kontak" type="text" placeholder="{{ $user->kontak }}" value="{{ $user->kontak }}">
                    </div>

                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input class="form-control" name="alamat" id="alamat" type="text" placeholder="{{ $user->alamat }}" value="{{ $user->alamat }}">
                    </div>

                    <div class="form-group">
                        <label for="gender">gender</label>
                        <input class="form-control" name="gender" id="gender" type="text" placeholder="{{ $user->gender }}" value="{{ $user->gender }}">
                    </div>

                    <div class="form-group">
                        <label for="user_image">user image</label>
                        <input class="form-control" name="user_image" id="user_image" type="text" placeholder="{{ $user->user_image }}" value="{{ $user->user_image }}">
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