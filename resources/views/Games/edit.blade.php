@extends('layouts.app')
@section('title', 'games')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New games</h4>
                    <p class="card-description">
                    <a class="btn btn-primary" href="/games" title="Go back"> Batal </a>
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

    <form action="/games/update/{{$games->id_game}}" method="POST">
        @csrf
       <!-- @method('PUT') -->

        
            <div class="form-group">
                <label for="id_game">id_game</label>
                <input class="form-control" name="id_game" id="id_game" type="text" placeholder="{{ $games->id_game }}" value="{{ $games->id_game }}">
            </div>
            
            <div class="form-group">
                <label for="game_name">game_name</label>
                <input class="form-control" name="game_name" id="game_name" type="text" placeholder="{{ $games->game_name }}" value="{{ $games->game_name }}">
            </div>
            
            <div class="form-group">
                <label for="game_image">game_image</label>
                <input class="form-control" name="game_image" id="game_image" type="text" placeholder="{{ $games->game_image }}" value="{{ $games->game_image }}">
            </div>
            
            <div class="form-group">
                <label for="created_at">created_at</label>
                <input class="form-control" name="created_at" id="created_at" type="text" placeholder="{{ $games->created_at }}" value="{{ $games->created_at }}">
            </div>
            
            <div class="form-group">
                <label for="updated_at">updated_at</label>
                <input class="form-control" name="updated_at" id="updated_at" type="text" placeholder="{{ $games->updated_at }}" value="{{ $games->updated_at }}">
            </div>
            
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
@endsection