@extends('layouts.dashboard')
@section('title', 'game_categories')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New game categories</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/game_categories" title="Go back"> Batal </a>
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

                <form action="/anggota/game_categories/update/{{$game_categories->id_game_category}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->

                    <div class="form-group">
                        <label for="game_category">Game Category</label>
                        <input class="form-control" name="game_category" id="game_category" type="text" placeholder="{{ $game_categories->game_category }}" value="{{ $game_categories->game_category }}">
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