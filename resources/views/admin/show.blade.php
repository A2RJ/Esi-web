@extends('layouts.dashboard')
@section('title', 'Admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{ $admin->id_admin }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="Admin/index" title="Go back"> Go back<i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>id admin:</strong>
                    {{ $admin->id_admin }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>jabatan:</strong>
                    {{ $admin->jabatan }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ig:</strong>
                    {{ $admin->ig }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>fb:</strong>
                    {{ $admin->fb }}
                </div>
            </div>
            
    </div>
@endsection