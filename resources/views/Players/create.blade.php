@extends('layouts.app')
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

            
            <div class="form-group">
                <label for="id_player">id_player</label>
                <input type="text" class="form-control" name="id_player" id="id_player" placeholder="id_player">
            </div>
            
            <div class="form-group">
                <label for="user_id">user_id</label>
                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="user_id">
            </div>
            
            <div class="form-group">
                <label for="squad_id">squad_id</label>
                <input type="text" class="form-control" name="squad_id" id="squad_id" placeholder="squad_id">
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
            
            <div class="form-group">
                <label for="created_at">created_at</label>
                <input type="text" class="form-control" name="created_at" id="created_at" placeholder="created_at">
            </div>
            
            <div class="form-group">
                <label for="updated_at">updated_at</label>
                <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="updated_at">
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

    </form>
@endsection