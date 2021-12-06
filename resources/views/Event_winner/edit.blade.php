@extends('layouts.app')
@section('title', 'event_winner')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New event_winner</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="/event_winner" title="Go back"> Batal </a>
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

                <form action="/event_winner/update/{{$event_winner->id_event_winner}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <!-- looping events and squads -->
                    <div class="form-group">
                        <label for="event_id">event</label>
                        <select class="form-control" name="event_id" id="event_id">
                            @foreach($events as $event)
                            <option value="{{ $event->id_event }}" {{ $event->id_event == $event_winner->id_event ? 'selected' : '' }}>{{ $event->event_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="squad_id">squad</label>
                        <select class="form-control" name="squad_id" id="squad_id">
                            @foreach($squads as $squad)
                            <option value="{{ $squad->id_squad }}" {{ $squad->id_squad == $event_winner->id_squad ? 'selected' : '' }}>{{ $squad->squad_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection