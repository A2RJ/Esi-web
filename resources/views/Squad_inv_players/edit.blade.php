@extends('layouts.dashboard')
@section('title', 'squad_inv_players')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New squad_inv_players</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/squad_inv_players" title="Go back"> Batal </a>
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

                <form action="/squad_inv_players/update/{{$squad_inv_players->id_squad_inv_player}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="form-group">
                        <label for="squad_id">Squad</label>
                        <input class="form-control" name="squad_id" id="squad_id" type="text" placeholder="{{ $squad_inv_players->squad_id }}" value="{{ $squad_inv_players->squad_id }}">
                    </div>

                    <div class="form-group">
                        <label for="player_id">Player</label>
                        <input class="form-control" name="player_id" id="player_id" type="text" placeholder="{{ $squad_inv_players->player_id }}" value="{{ $squad_inv_players->player_id }}">
                    </div>

                    <div class="form-group">
                        <!-- <label for="status">Status</label> -->
                        <input class="form-control" name="status" id="status" type="hidden" placeholder="{{ $squad_inv_players->status }}" value="{{ $squad_inv_players->status }}">
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection