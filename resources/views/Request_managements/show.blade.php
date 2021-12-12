@extends('layouts.dashboard')
@section('title', 'Request_managements')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> {{ $request_managements->id_request_management }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="Request_managements/index" title="Go back"> Go back<i class="fas fa-backward "></i> </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>id request squad:</strong>
            {{ $request_managements->id_request_squad }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>squad id:</strong>
            {{ $request_managements->squad_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>management id:</strong>
            {{ $request_managements->management_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>status:</strong>
            {{ $request_managements->status }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>created at:</strong>
            {{ $request_managements->created_at }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>updated at:</strong>
            {{ $request_managements->updated_at }}
        </div>
    </div>

</div>
@endsection