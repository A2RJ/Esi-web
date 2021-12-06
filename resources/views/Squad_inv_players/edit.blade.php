@extends('layouts.app')
@section('title', 'squad_inv_players')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New squad_inv_players</h4>
                    <p class="card-description">
                    <a class="btn btn-primary" href="/squad_inv_players" title="Go back"> Batal </a>
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

    <form action="/squad_inv_players/update/{{$squad_inv_players->id_squad_inv_player}}" method="POST">
        @csrf
       <!-- @method('PUT') -->

        
            <div class="form-group">
                <label for="id_squad_inv_player">id_squad_inv_player</label>
                <input class="form-control" name="id_squad_inv_player" id="id_squad_inv_player" type="text" placeholder="{{ $squad_inv_players->id_squad_inv_player }}" value="{{ $squad_inv_players->id_squad_inv_player }}">
            </div>
            
            <div class="form-group">
                <label for="squad_id">squad_id</label>
                <input class="form-control" name="squad_id" id="squad_id" type="text" placeholder="{{ $squad_inv_players->squad_id }}" value="{{ $squad_inv_players->squad_id }}">
            </div>
            
            <div class="form-group">
                <label for="player_id">player_id</label>
                <input class="form-control" name="player_id" id="player_id" type="text" placeholder="{{ $squad_inv_players->player_id }}" value="{{ $squad_inv_players->player_id }}">
            </div>
            
            <div class="form-group">
                <label for="status">status</label>
                <input class="form-control" name="status" id="status" type="text" placeholder="{{ $squad_inv_players->status }}" value="{{ $squad_inv_players->status }}">
            </div>
            
            <div class="form-group">
                <label for="created_at">created_at</label>
                <input class="form-control" name="created_at" id="created_at" type="text" placeholder="{{ $squad_inv_players->created_at }}" value="{{ $squad_inv_players->created_at }}">
            </div>
            
            <div class="form-group">
                <label for="updated_at">updated_at</label>
                <input class="form-control" name="updated_at" id="updated_at" type="text" placeholder="{{ $squad_inv_players->updated_at }}" value="{{ $squad_inv_players->updated_at }}">
            </div>
            
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
@endsection