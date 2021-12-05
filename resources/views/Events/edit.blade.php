@extends('layouts.app')
@section('title', 'events')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add New events</h4>
        <p class="card-description">
          <a class="btn btn-primary" href="/events" title="Go back"> Batal </a>
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

        <form action="/events/update/{{$event->id_event}}" method="POST">
          @csrf
          <!-- @method('PUT') -->


          <div class="form-group">
            <label for="id_event">id_event</label>
            <input class="form-control" name="id_event" id="id_event" type="text" placeholder="{{ $event->id_event }}" value="{{ $event->id_event }}">
          </div>

          <div class="form-group">
            <label for="game_id">game_id</label>
            <input class="form-control" name="game_id" id="game_id" type="text" placeholder="{{ $event->game_id }}" value="{{ $event->game_id }}">
          </div>

          <div class="form-group">
            <label for="user_id">user_id</label>
            <input class="form-control" name="user_id" id="user_id" type="text" placeholder="{{ $event->user_id }}" value="{{ $event->user_id }}">
          </div>

          <div class="form-group">
            <label for="event_name">event_name</label>
            <input class="form-control" name="event_name" id="event_name" type="text" placeholder="{{ $event->event_name }}" value="{{ $event->event_name }}">
          </div>

          <div class="form-group">
            <label for="event_image">event_image</label>
            <input class="form-control" name="event_image" id="event_image" type="text" placeholder="{{ $event->event_image }}" value="{{ $event->event_image }}">
          </div>

          <div class="form-group">
            <label for="slot">slot</label>
            <input class="form-control" name="slot" id="slot" type="text" placeholder="{{ $event->slot }}" value="{{ $event->slot }}">
          </div>

          <div class="form-group">
            <label for="pricepool">pricepool</label>
            <input class="form-control" name="pricepool" id="pricepool" type="text" placeholder="{{ $event->pricepool }}" value="{{ $event->pricepool }}">
          </div>

          <div class="form-group">
            <label for="detail">detail</label>
            <input class="form-control" name="detail" id="detail" type="text" placeholder="{{ $event->detail }}" value="{{ $event->detail }}">
          </div>

          <div class="form-group">
            <label for="peraturan">peraturan</label>
            <input class="form-control" name="peraturan" id="peraturan" type="text" placeholder="{{ $event->peraturan }}" value="{{ $event->peraturan }}">
          </div>

          <div class="form-group">
            <label for="start">start</label>
            <input class="form-control" name="start" id="start" type="text" placeholder="{{ $event->start }}" value="{{ $event->start }}">
          </div>

          <div class="form-group">
            <label for="end">end</label>
            <input class="form-control" name="end" id="end" type="text" placeholder="{{ $event->end }}" value="{{ $event->end }}">
          </div>

          <div class="form-group">
            <label for="created_at">created_at</label>
            <input class="form-control" name="created_at" id="created_at" type="text" placeholder="{{ $event->created_at }}" value="{{ $event->created_at }}">
          </div>

          <div class="form-group">
            <label for="updated_at">updated_at</label>
            <input class="form-control" name="updated_at" id="updated_at" type="text" placeholder="{{ $event->updated_at }}" value="{{ $event->updated_at }}">
          </div>

          <div class="mt-5">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

        </form>
        @endsection