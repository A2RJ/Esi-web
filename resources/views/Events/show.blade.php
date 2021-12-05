@extends('layouts.app')
@section('title', 'Events')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{ $events->id_event }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="Events/index" title="Go back"> Go back<i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>id_event:</strong>
                    {{ $events->id_event }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>game_id:</strong>
                    {{ $events->game_id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>user_id:</strong>
                    {{ $events->user_id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>event_name:</strong>
                    {{ $events->event_name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>event_image:</strong>
                    {{ $events->event_image }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>slot:</strong>
                    {{ $events->slot }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>pricepool:</strong>
                    {{ $events->pricepool }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>detail:</strong>
                    {{ $events->detail }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>peraturan:</strong>
                    {{ $events->peraturan }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>start:</strong>
                    {{ $events->start }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>end:</strong>
                    {{ $events->end }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>created_at:</strong>
                    {{ $events->created_at }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>updated_at:</strong>
                    {{ $events->updated_at }}
                </div>
            </div>
            
    </div>
@endsection