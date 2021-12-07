@extends('layouts.dashboard')
@section('title', 'players')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New players</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="/players" title="Go back"> Batal </a>
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

                <form action="/players/update/{{$players->id_player}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <!-- select users -->
                    <div class="form-group">
                        <label for="user_id">User</label>
                        <select class="form-control" name="user_id" id="user_id">
                            <option>Pilih User</option>
                            @foreach($users as $user)
                            <option value="{{$user->id_user}}" {{$user->id_user == $players->user_id ? 'selected' : ''}}>{{$user->nama}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- select squads -->
                    <div class="form-group">
                        <label for="squad_id">Squad</label>
                        <select class="form-control" name="squad_id" id="squad_id">
                            <option>Pilih Squad</option>
                            @foreach($squads as $squad)
                            <option value="{{$squad->id_squad}}" {{$squad->id_squad == $players->squad_id ? 'selected' : ''}}>{{$squad->squad_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- select game -->
                    <div class="form-group">
                        <label for="game_id">Game</label>
                        <select class="form-control" name="game_id" id="game_id">
                            <option>Pilih Game</option>
                            @foreach($games as $game)
                            <option value="{{$game->id_game}}" {{$game->id_game == $players->game_id ? 'selected' : ''}}>{{$game->game_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ingame_name">ingame_name</label>
                        <input class="form-control" name="ingame_name" id="ingame_name" type="text" placeholder="{{ $players->ingame_name }}" value="{{ $players->ingame_name }}">
                    </div>

                    <div class="form-group">
                        <label for="ingame_id">ingame_id</label>
                        <input class="form-control" name="ingame_id" id="ingame_id" type="text" placeholder="{{ $players->ingame_id }}" value="{{ $players->ingame_id }}">
                    </div>

                    <div class="form-group">
                        <label for="player_image">player_image</label>
                        <input class="form-control" name="player_image" id="player_image" type="text" placeholder="{{ $players->player_image }}" value="{{ $players->player_image }}">
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection