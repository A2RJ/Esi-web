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
                <form action="/players/store" method="POST" class="forms-sample">
                    @csrf
                    <!-- select users -->
                    <div class="form-group">
                        <label for="user_id">Select User</label>
                        <select class="form-control form-control-lg" id="user_id" name="user_id">
                            <option value="">Select User</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id_user }}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- select squads -->
                    <div class="form-group">
                        <label for="squad_id">Select Squad</label>
                        <select class="form-control form-control-lg" id="squad_id" name="squad_id">
                            <option value="">Select Squad</option>
                            @foreach($squads as $squad)
                            <option value="{{ $squad->id_squad }}">{{ $squad->squad_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- select games -->
                    <div class="form-group">
                        <label for="games">games</label>
                        <select class="form-control" name="game_id" id="game_id">
                            <option value="">Select games</option>
                            @foreach($games as $game)
                            <option value="{{ $game->id_game }}">{{ $game->game_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ingame_name">ingame_name</label>
                        <input type="text" class="form-control" name="ingame_name" id="ingame_name" placeholder="ingame_name">
                    </div>

                    <div class="form-group">
                        <label for="ingame_id">ingame_id</label>
                        <input type="text" class="form-control" name="ingame_id" id="ingame_id" placeholder="ingame_id">
                    </div>

                    <div class="form-group">
                        <label for="player_image">player_image</label>
                        <input type="text" class="form-control" name="player_image" id="player_image" placeholder="player_image">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection