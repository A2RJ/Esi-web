@extends('layouts.dashboard')
@section('title', 'management_inv_squads')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Invite squads</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/anggota/management_inv_squads" title="Go back"> Batal </a>
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
                <form action="/anggota/management_inv_squads/store" method="POST" class="forms-sample">
                    @csrf
                    <!-- select managements -->
                    <div class="form-group">
                        <label for="management_id">Management</label>
                        <select class="form-control" name="management_id" id="management_id">
                            <option value="">-- Select Management --</option>
                            @foreach($managements as $management)
                            <option value="{{ $management->id_management  }}">{{ $management->management_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- looping squads -->
                    <div class="form-group">
                        <label for="squad_id">Squad</label>
                        <select class="form-control" name="squad_id" id="squad_id">
                            <option value="">-- Select Squad --</option>
                            @foreach($squads as $squad)
                            <option value="{{ $squad->id_squad }}">{{ $squad->squad_name }}</option>
                            @endforeach
                        </select>
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