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
                <form action="/admin/store" method="POST" class="forms-sample">
                    @csrf
                    <!-- select users -->
                    <div class="form-group">
                        <label for="user_id">Select Users</label>
                        <select class="form-control form-control-lg" id="user_id" name="user_id">
                            @foreach($users as $user)
                            <option value="{{ $user->id_user }}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="jabatan">
                    </div>

                    <div class="form-group">
                        <label for="ig">Instagram</label>
                        <input type="text" class="form-control" name="ig" id="ig" placeholder="ig">
                    </div>

                    <div class="form-group">
                        <label for="fb">Facebook</label>
                        <input type="text" class="form-control" name="fb" id="fb" placeholder="fb">
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