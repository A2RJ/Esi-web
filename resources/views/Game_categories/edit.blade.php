@extends('layouts.app')
@section('title', 'game_categories')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New game_categories</h4>
                    <p class="card-description">
                    <a class="btn btn-primary" href="/game_categories" title="Go back"> Batal </a>
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

    <form action="/game_categories/update/{{$game_categories->id_game_category}}" method="POST">
        @csrf
       <!-- @method('PUT') -->

        
            <div class="form-group">
                <label for="id_game_category">id_game_category</label>
                <input class="form-control" name="id_game_category" id="id_game_category" type="text" placeholder="{{ $game_categories->id_game_category }}" value="{{ $game_categories->id_game_category }}">
            </div>
            
            <div class="form-group">
                <label for="game_category">game_category</label>
                <input class="form-control" name="game_category" id="game_category" type="text" placeholder="{{ $game_categories->game_category }}" value="{{ $game_categories->game_category }}">
            </div>
            
            <div class="form-group">
                <label for="created_at">created_at</label>
                <input class="form-control" name="created_at" id="created_at" type="text" placeholder="{{ $game_categories->created_at }}" value="{{ $game_categories->created_at }}">
            </div>
            
            <div class="form-group">
                <label for="updated_at">updated_at</label>
                <input class="form-control" name="updated_at" id="updated_at" type="text" placeholder="{{ $game_categories->updated_at }}" value="{{ $game_categories->updated_at }}">
            </div>
            
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
@endsection