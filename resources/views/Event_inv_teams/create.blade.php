@extends('layouts.app')
@section('title', 'event_inv_teams')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New event_inv_teams</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="/event_inv_teams" title="Go back"> Batal </a>
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
                <form action="/event_inv_teams/store" method="POST" class="forms-sample">
                    @csrf
                    <!-- looping event -->
                    <div class="form-group">
                        <label for="event_id">event</label>
                        <select class="form-control" name="event_id" id="event_id">
                            <option value="">Pilih Event</option>
                            @foreach($events as $data)
                            <option value="{{ $data->id_event }}">{{ $data->event_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- looping squads -->
                    <div class="form-group">
                        <label for="squad_id">squad</label>
                        <select class="form-control" name="squad_id" id="squad_id">
                            <option value="">Pilih Squad</option>
                            @foreach($squads as $data)
                            <option value="{{ $data->id_squad }}">{{ $data->squad_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection