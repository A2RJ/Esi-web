@extends('layouts.dashboard')
@section('title', 'Events')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> {{ $event->id_event }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/events" title="Go back"> Go back<i class="fas fa-backward "></i> </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>id_event:</strong>
            {{ $event->id_event }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>game_id:</strong>
            {{ $event->game_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>user_id:</strong>
            {{ $event->user_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>event_name:</strong>
            {{ $event->event_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>event_image:</strong>
            {{ $event->event_image }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>slot:</strong>
            {{ $event->slot }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>pricepool:</strong>
            {{ $event->pricepool }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>detail:</strong>
            {{ $event->detail }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>peraturan:</strong>
            {{ $event->peraturan }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>start:</strong>
            {{ $event->start }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>end:</strong>
            {{ $event->end }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>created_at:</strong>
            {{ $event->created_at }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>updated_at:</strong>
            {{ $event->updated_at }}
        </div>
    </div>

    <!-- looping event teams -->
    @foreach($event->event_teams as $event_team)
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>name:</strong>
            {{ $event_team->squad_name }}
        </div>
    </div>
    @endforeach
</div>
@endsection