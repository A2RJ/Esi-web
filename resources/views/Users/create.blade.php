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
                <form action="/users/store" method="POST" class="forms-sample">
                    @csrf 
                    <div class="form-group">
                        <label for="user_role">user role</label>
                        <input type="text" class="form-control" name="user_role" id="user_role" placeholder="user_role">
                    </div>

                    <div class="form-group">
                        <label for="nama">user role</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="nama">
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="email">
                    </div>

                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="password">
                    </div>

                    <div class="form-group">
                        <label for="kontak">kontak</label>
                        <input type="text" class="form-control" name="kontak" id="kontak" placeholder="kontak">
                    </div>

                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat">
                    </div>

                    <div class="form-group">
                        <label for="gender">gender</label>
                        <input type="text" class="form-control" name="gender" id="gender" placeholder="gender">
                    </div>

                    <div class="form-group">
                        <label for="user_image">user image</label>
                        <input type="text" class="form-control" name="user_image" id="user_image" placeholder="user_image">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection