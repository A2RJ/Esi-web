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
                <form action="/squad_inv_players/store" method="POST" class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="squad_id">squad_id</label>
                        <input type="text" class="form-control" name="squad_id" id="squad_id" placeholder="squad_id">
                    </div>

                    <div class="form-group">
                        <label for="player_id">player_id</label>
                        <input type="text" class="form-control" name="player_id" id="player_id" placeholder="player_id">
                    </div>

                    <div class="form-group">
                        <label for="status">status</label>
                        <input type="text" class="form-control" name="status" id="status" placeholder="status">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection