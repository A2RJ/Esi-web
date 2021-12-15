@extends('layouts.dashboard')
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
                <form action="/games/store" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf

                    <div class="form-group">
                        <label for="game_name">game_name</label>
                        <input type="text" class="form-control" name="game_name" id="game_name" placeholder="game_name">
                    </div>

                    <div class="form-group">
                        <label for="game_image">game_image</label>
                        <input type="text" class="form-control" name="game_image" id="game_image" placeholder="game_image">
                    </div>

                    <!-- looping category -->
                    <div class="form-group">
                        <label for="game_category_id">game_category</label>
                        <select class="form-control" name="game_category_id" id="game_category_id">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id_game_category }}">{{ $category->game_category }}</option>
                            @endforeach
                        </select>
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