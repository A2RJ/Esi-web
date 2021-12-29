@extends('layouts.dashboard')
@section('title', 'Request_squads')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{ $request_squads->id_request_squad }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/anggota/Request_squads/index" title="Go back"> Go back<i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>id request squad:</strong>
                    {{ $request_squads->id_request_squad }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>player id:</strong>
                    {{ $request_squads->player_id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>squad id:</strong>
                    {{ $request_squads->squad_id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>status:</strong>
                    {{ $request_squads->status }}
                </div>
            </div>
            
    </div>
@endsection