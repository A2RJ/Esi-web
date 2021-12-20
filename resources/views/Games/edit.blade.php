@extends('layouts.dashboard')
@section('title', 'games')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New games</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/games" title="Go back"> Batal </a>
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

                <form action="/games/update/{{$games->id_game}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="form-group">
                        <label for="game_name">Game Name</label>
                        <input class="form-control" name="game_name" id="game_name" type="text" placeholder="{{ $games->game_name }}" value="{{ $games->game_name }}">
                    </div>

                    <div class="form-group">
                        <label for="game_image">Game Image</label>
                        <input class="form-control" name="game_image" id="game_image" type="file" placeholder="{{ $games->game_image }}" value="{{ $games->game_image }}">
                    </div>

                    <!-- looping categories -->
                    <div class="form-group">
                        <label for="game_category_id">Game Category</label>
                        <select class="form-control" name="game_category_id" id="game_category_id">
                            <option value="">-- Select Kategori --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id_game_category  }}" {{ $category->id_game_category == $games->game_category_id ? 'selected' : '' }}>{{ $category->game_category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection