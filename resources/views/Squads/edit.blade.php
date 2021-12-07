@extends('layouts.dashboard')
@section('title', 'squads')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New squads</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="/squads" title="Go back"> Batal </a>
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

                <form action="/squads/update/{{$squad->id_squad}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="form-group">
                        <label for="squad_name">squad_name</label>
                        <input class="form-control" name="squad_name" id="squad_name" type="text" placeholder="{{ $squad->squad_name }}" value="{{ $squad->squad_name }}">
                    </div>

                    <div class="form-group">
                        <label for="squad_leader">squad_leader</label>
                        <input class="form-control" name="squad_leader" id="squad_leader" type="text" placeholder="{{ $squad->squad_leader }}" value="{{ $squad->squad_leader }}">
                    </div>

                    <div class="form-group">
                        <label for="management_id">management_id</label>
                        <input class="form-control" name="management_id" id="management_id" type="text" placeholder="{{ $squad->management_id }}" value="{{ $squad->management_id }}">
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection