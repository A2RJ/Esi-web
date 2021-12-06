@extends('layouts.app')
@section('title', 'Game_categories')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{ $game_categories->id_game_category }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="Game_categories/index" title="Go back"> Go back<i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>id_game_category:</strong>
                    {{ $game_categories->id_game_category }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>game_category:</strong>
                    {{ $game_categories->game_category }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>created_at:</strong>
                    {{ $game_categories->created_at }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>updated_at:</strong>
                    {{ $game_categories->updated_at }}
                </div>
            </div>
            
    </div>
@endsection