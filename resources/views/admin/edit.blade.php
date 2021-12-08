@extends('layouts.dashboard')
@section('title', 'admin')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New admin</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="/admin" title="Go back"> Batal </a>
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

                <form action="/admin/update/{{$admin->id_admin}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="form-group">
                        <label for="jabatan">jabatan</label>
                        <input class="form-control" name="jabatan" id="jabatan" type="text" placeholder="{{ $admin->jabatan }}" value="{{ $admin->jabatan }}">
                    </div>

                    <div class="form-group">
                        <label for="ig">ig</label>
                        <input class="form-control" name="ig" id="ig" type="text" placeholder="{{ $admin->ig }}" value="{{ $admin->ig }}">
                    </div>

                    <div class="form-group">
                        <label for="fb">fb</label>
                        <input class="form-control" name="fb" id="fb" type="text" placeholder="{{ $admin->fb }}" value="{{ $admin->fb }}">
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection