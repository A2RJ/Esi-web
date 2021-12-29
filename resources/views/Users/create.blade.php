@extends('layouts.dashboard')
@section('title', 'users')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New users</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/anggota/users" title="Go back"> Batal </a>
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
                <form action="/anggota/users/store" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="user_role">User Role</label>
                            <select name="user_role" id="user_role" class="form-control">
                                <option value="player">Player</option>
                                <option value="management">Management</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="nama">Fullname</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="nama">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="email">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="password">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="kontak">Kontak</label>
                            <input type="text" class="form-control" name="kontak" id="kontak" placeholder="kontak">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="gender">Gender</label>
                            <!-- select gender -->
                            <select class="form-control" id="gender" name="gender">
                                <option value="l">Laki-Laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="user_image">User Image</label>
                            <input  class="form-control" name="user_image" id="user_image" type="file">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection