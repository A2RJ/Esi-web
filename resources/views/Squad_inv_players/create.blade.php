@extends('layouts.dashboard')
@section('title', 'squad_inv_players')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New squad_inv_players</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/anggota/squad_inv_players" title="Go back"> Batal </a>
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

                <!-- check message error -->
                @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
                @endif
                <form action="/anggota/squad_inv_players/store" method="POST" class="forms-sample">
                    @csrf
                    <!-- select users -->
                    <div class="form-group">
                        <label for="player_id">Player</label>
                        <select class="form-control form-control-lg" id="player_id" name="player_id">
                            <option value="">Select player</option>
                            @foreach($players as $player)
                            <option value="{{ $player->id_player }}">{{ $player->ingame_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- select squads -->
                    <div class="form-group">
                        <label for="squad_id">Squad</label>
                        <select class="form-control form-control-lg" id="squad_id" name="squad_id">
                            <option value="{{ $squad->id_squad }}">{{ $squad->squad_name }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <!-- <label for="status">status</label> -->
                        <input type="hidden" class="form-control" name="status" id="status" value="0" readonly>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection