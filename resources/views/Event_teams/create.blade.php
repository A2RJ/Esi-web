@extends('layouts.dashboard')
@section('title', 'event_teams')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New event teams</h4>
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
                <form action="/event_teams/store" method="POST" class="forms-sample">
                    @csrf
                    <!-- looping event -->
                    <div class="form-group">
                        <label for="event_id">event</label>
                        <select class="form-control" name="event_id" id="event_id">
                            @foreach($events as $event)
                            <option value="{{ $event->id_event }}">{{ $event->event_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- looping $squads -->
                    <div class="form-group">
                        <label for="id_squad">id_squad</label>
                        <select class="form-control" name="squad_id" id="squad_id">
                            @foreach($squads as $squad)
                            <option value="{{ $squad->id_squad }}">{{ $squad->squad_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="isfree">isfree</label>
                        <input type="text" class="form-control" name="isfree" id="isfree" placeholder="isfree">
                    </div>

                    <div class="form-group">
                        <label for="ispaid">ispaid</label>
                        <input type="text" class="form-control" name="ispaid" id="ispaid" placeholder="ispaid">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection