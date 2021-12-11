@extends('layouts.dashboard')
@section('title', 'request_squads')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New request_squads</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="/request_squads" title="Go back"> Batal </a>
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

                <form action="/request_squads/update/{{$request_squads->id_request_squad}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <!-- players -->
                    <div class="form-group">
                        <label for="player_id">player id</label>
                        <select class="form-control" name="player_id" id="player_id">
                            @foreach($players as $player)
                            <option value="{{ $player->id_player }}" {{ $player->id_player == $request_squads->player_id ? 'selected' : '' }}>{{ $player->ingame_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- squads -->
                    <div class="form-group">
                        <label for="squad_id">squad id</label>
                        <select class="form-control" name="squad_id" id="squad_id">
                            @foreach($squads as $squad)
                            <option value="{{ $squad->id_squad }}" {{ $squad->id_squad == $request_squads->squad_id ? 'selected' : '' }}>{{ $squad->squad_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">status</label>
                        <input class="form-control" name="status" id="status" type="text" placeholder="{{ $request_squads->status }}" value="{{ $request_squads->status }}">
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection