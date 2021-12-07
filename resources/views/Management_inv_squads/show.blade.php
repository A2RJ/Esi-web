@extends('layouts.dashboard')
@section('title', 'Management_inv_squads')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{ $management_inv_squads->id_management_inv_squad }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="Management_inv_squads/index" title="Go back"> Go back<i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>id_management_inv_squad:</strong>
                    {{ $management_inv_squads->id_management_inv_squad }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>management_id:</strong>
                    {{ $management_inv_squads->management_id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>squad_id:</strong>
                    {{ $management_inv_squads->squad_id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>created_at:</strong>
                    {{ $management_inv_squads->created_at }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>updated_at:</strong>
                    {{ $management_inv_squads->updated_at }}
                </div>
            </div>
            
    </div>
@endsection