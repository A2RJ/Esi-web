@extends('layouts.app')
@section('title', 'squads')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New squads</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="/squads" title="Go back"> Batal </a>
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
                <form action="/squads/store" method="POST" class="forms-sample">
                    @csrf 
                    <div class="form-group">
                        <label for="squad_name">squad_name</label>
                        <input type="text" class="form-control" name="squad_name" id="squad_name" placeholder="squad_name">
                    </div>

                    <div class="form-group">
                        <label for="squad_leader">squad_leader</label>
                        <input type="text" class="form-control" name="squad_leader" id="squad_leader" placeholder="squad_leader">
                    </div>

                    <div class="form-group">
                        <label for="management_id">management_id</label>
                        <input type="text" class="form-control" name="management_id" id="management_id" placeholder="management_id">
                    </div> 

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection