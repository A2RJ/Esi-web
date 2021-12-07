@extends('layouts.dashboard')
@section('title', 'event_teams')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New event_teams</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="/event_teams" title="Go back"> Batal </a>
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

                <form action="/event_teams/update/{{$event_team->id_event_teams}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->

                    <!-- looping event -->
                    <div class="form-group">
                        <label for="event_id">event</label>
                        <select class="form-control" name="event_id" id="event_id">
                            @foreach ($events as $event)
                            <option value="{{ $event->id_event }}" {{ $event->id_event == $event_team->id_event ? 'selected' : '' }}>{{ $event->event_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- looping $squads -->
                    <div class="form-group">
                        <label for="id_squads">id_squads</label>
                        <select class="form-control" name="squad_id" id="squad_id">
                            @foreach($squads as $squad)
                            <option value="{{ $squad->id_squad }}" {{ $squad->id_squad == $event_team->id_squad ? 'selected' : '' }}>{{ $squad->squad_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="isfree">isfree</label>
                        <input class="form-control" name="isfree" id="isfree" type="text" placeholder="{{ $event_team->isfree }}" value="{{ $event_team->isfree }}">
                    </div>

                    <div class="form-group">
                        <label for="ispaid">ispaid</label>
                        <input class="form-control" name="ispaid" id="ispaid" type="text" placeholder="{{ $event_team->ispaid }}" value="{{ $event_team->ispaid }}">
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection