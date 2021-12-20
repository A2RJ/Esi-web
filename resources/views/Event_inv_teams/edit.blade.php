@extends('layouts.dashboard')
@section('title', 'event_inv_teams')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit invited team</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/event_inv_teams" title="Go back"> Batal </a>
                </p> -->

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

                <form action="/event_inv_teams/update/{{$event_inv_teams->id_event_inv_teams}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <!-- looping events -->
                    <div class="form-group">
                        <label for="event_id">Event</label>
                        <select class="form-control" name="event_id" id="event_id">
                            @foreach($events as $event)
                            <option value="{{ $event->id_event }}" {{ $event->id_event == $event_inv_teams->id_event ? 'selected' : '' }}>{{ $event->event_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- looping squads -->
                    <div class="form-group">
                        <label for="squad_id">Squad</label>
                        <select class="form-control" name="squad_id" id="squad_id">
                            <option value="">Select Squad</option>
                            @foreach($squads as $squad)
                            <option value="{{ $squad->id_squad }}" {{ $squad->id_squad == $event_inv_teams->id_squad ? 'selected' : '' }}>{{ $squad->squad_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection