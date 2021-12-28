@extends('layouts.dashboard')
@section('title', 'admin')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit admin</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/admin" title="Go back"> Batal </a>
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

                <form action="/admin/update/{{$admin->id_admin}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="row">
                        <!-- looping users -->
                        <div class="form-group col-sm-6">
                            <label>User:</label>
                            <select class="form-control">
                                @foreach ($users as $user)
                                <option value="{{$user->id_user}}" {{$user->id_user == $admin->id_user ? 'selected' : ''}}>{{$user->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="jabatan">Jabatan</label>
                            <input class="form-control" name="jabatan" id="jabatan" type="text" placeholder="{{ $admin->jabatan }}" value="{{ $admin->jabatan }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="ig">Instagram</label>
                            <input class="form-control" name="ig" id="ig" type="text" placeholder="{{ $admin->ig }}" value="{{ $admin->ig }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="fb">Facebook</label>
                            <input class="form-control" name="fb" id="fb" type="text" placeholder="{{ $admin->fb }}" value="{{ $admin->fb }}">
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