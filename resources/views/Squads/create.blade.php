@extends('layouts.dashboard')
@section('title', 'squads')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New squads</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/squads" title="Go back"> Batal </a>
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
                <form action="/squads/store" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="game_id">Games</label>
                            <select class="form-control" id="game_id" name="game_id">
                                <option>-- Select Games --</option>
                                @foreach ($games as $game)
                                <option value="{{ $game->id_game }}">{{ $game->game_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- select players -->
                        <div class="form-group col-sm-6">
                            <label for="squad_leader">Select Leader</label>
                            <select class="form-control" id="squad_leader" name="squad_leader">
                                <option>Select Player</option>
                                @foreach($players as $player)
                                <option value="{{ $player->id_player }}">{{ $player->ingame_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="squad_name">squad_name</label>
                            <input type="text" class="form-control" name="squad_name" id="squad_name" placeholder="squad_name">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="squad_image">squad_image</label>
                            <input type="file" class="form-control" name="squad_image" id="squad_image" placeholder="squad_image">
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