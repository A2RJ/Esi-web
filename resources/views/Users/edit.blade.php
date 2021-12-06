@extends('layouts.app')
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

    <form action="/users/update/{{$users->id_user}}" method="POST">
        @csrf
       <!-- @method('PUT') -->

        
            <div class="form-group">
                <label for="id_user">id_user</label>
                <input class="form-control" name="id_user" id="id_user" type="text" placeholder="{{ $users->id_user }}" value="{{ $users->id_user }}">
            </div>
            
            <div class="form-group">
                <label for="user_role">user_role</label>
                <input class="form-control" name="user_role" id="user_role" type="text" placeholder="{{ $users->user_role }}" value="{{ $users->user_role }}">
            </div>
            
            <div class="form-group">
                <label for="email">email</label>
                <input class="form-control" name="email" id="email" type="text" placeholder="{{ $users->email }}" value="{{ $users->email }}">
            </div>
            
            <div class="form-group">
                <label for="password">password</label>
                <input class="form-control" name="password" id="password" type="text" placeholder="{{ $users->password }}" value="{{ $users->password }}">
            </div>
            
            <div class="form-group">
                <label for="kontak">kontak</label>
                <input class="form-control" name="kontak" id="kontak" type="text" placeholder="{{ $users->kontak }}" value="{{ $users->kontak }}">
            </div>
            
            <div class="form-group">
                <label for="alamat">alamat</label>
                <input class="form-control" name="alamat" id="alamat" type="text" placeholder="{{ $users->alamat }}" value="{{ $users->alamat }}">
            </div>
            
            <div class="form-group">
                <label for="gender">gender</label>
                <input class="form-control" name="gender" id="gender" type="text" placeholder="{{ $users->gender }}" value="{{ $users->gender }}">
            </div>
            
            <div class="form-group">
                <label for="user_image">user_image</label>
                <input class="form-control" name="user_image" id="user_image" type="text" placeholder="{{ $users->user_image }}" value="{{ $users->user_image }}">
            </div>
            
            <div class="form-group">
                <label for="created_at">created_at</label>
                <input class="form-control" name="created_at" id="created_at" type="text" placeholder="{{ $users->created_at }}" value="{{ $users->created_at }}">
            </div>
            
            <div class="form-group">
                <label for="updated_at">updated_at</label>
                <input class="form-control" name="updated_at" id="updated_at" type="text" placeholder="{{ $users->updated_at }}" value="{{ $users->updated_at }}">
            </div>
            
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
@endsection