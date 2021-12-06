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


                    <div class="form-group">
                        <label for="id_event_winner">id_event_winner</label>
                        <input class="form-control" name="id_event_winner" id="id_event_winner" type="text" placeholder="{{ $event_winner->id_event_winner }}" value="{{ $event_winner->id_event_winner }}">
                    </div>

                    <div class="form-group">
                        <label for="event_id">event_id</label>
                        <input class="form-control" name="event_id" id="event_id" type="text" placeholder="{{ $event_winner->event_id }}" value="{{ $event_winner->event_id }}">
                    </div>

                    <div class="form-group">
                        <label for="squad_id">squad_id</label>
                        <input class="form-control" name="squad_id" id="squad_id" type="text" placeholder="{{ $event_winner->squad_id }}" value="{{ $event_winner->squad_id }}">
                    </div>

                    <div class="form-group">
                        <label for="created_at">created_at</label>
                        <input class="form-control" name="created_at" id="created_at" type="text" placeholder="{{ $event_winner->created_at }}" value="{{ $event_winner->created_at }}">
                    </div>

                    <div class="form-group">
                        <label for="updated_at">updated_at</label>
                        <input class="form-control" name="updated_at" id="updated_at" type="text" placeholder="{{ $event_winner->updated_at }}" value="{{ $event_winner->updated_at }}">
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection