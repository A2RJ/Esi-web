@extends('layouts.dashboard')
@section('title', 'game_categories')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New game categories</h4>
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
                <form action="/game_categories/store" method="POST" class="forms-sample">
                    @csrf

                    <div class="form-group">
                        <label for="game_category">game_category</label>
                        <input type="text" class="form-control" name="game_category" id="game_category" placeholder="game_category">
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