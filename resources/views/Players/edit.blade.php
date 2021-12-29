@extends('layouts.dashboard')
@section('title', 'players')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New players</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/anggota/players" title="Go back"> Batal </a>
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

                <form action="/anggota/players/update/{{$players->id_player}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="game_id">Game</label>
                            <select class="form-control" name="game_id" id="game_id">
                                <option>Pilih Game</option>
                                @foreach($games as $game)
                                <option value="{{$game->id_game}}" {{$game->id_game == $players->game_id ? 'selected' : ''}}>{{$game->game_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="ingame_name">In Game Name</label>
                            <input class="form-control" name="ingame_name" id="ingame_name" type="text" placeholder="{{ $players->ingame_name }}" value="{{ $players->ingame_name }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="ingame_id">In Game Id</label>
                            <input class="form-control" name="ingame_id" id="ingame_id" type="text" placeholder="{{ $players->ingame_id }}" value="{{ $players->ingame_id }}">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="player_image">Player Image</label>
                            <input class="form-control" name="player_image" id="player_image" type="file">
                        </div>

                        <div class="mt-2 col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection