@extends('layouts.app')
@section('title', 'Event_inv_teams')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{ $event_inv_teams->id_event_inv_teams }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="Event_inv_teams/index" title="Go back"> Go back<i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>id_event_int_teams:</strong>
                    {{ $event_inv_teams->id_event_int_teams }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>event_id:</strong>
                    {{ $event_inv_teams->event_id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>squad_id:</strong>
                    {{ $event_inv_teams->squad_id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>created_at:</strong>
                    {{ $event_inv_teams->created_at }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>updated_at:</strong>
                    {{ $event_inv_teams->updated_at }}
                </div>
            </div>
            
    </div>
@endsection