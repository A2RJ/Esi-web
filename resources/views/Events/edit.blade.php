@extends('layouts.dashboard')
@section('title', 'events')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add New events</h4>
        <!-- <p class="card-description">
          <a class="btn btn-primary" href="/events" title="Go back"> Batal </a>
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

        <form action="/events/update/{{$event->id_event}}" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- @method('PUT') -->
          <!-- select games -->
          <div class="form-group">
            <label for="game_id">Games</label>
            <select class="form-control" name="game_id" id="game_id">
              @foreach($games as $game)
              <option value="{{$game->id_game}}" {{$game->id_game == $event->game_id ? 'selected' : ''}}>{{$game->game_name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="event_name">Event Name</label>
            <input class="form-control" name="event_name" id="event_name" type="text" placeholder="{{ $event->event_name }}" value="{{ $event->event_name }}">
          </div>

          <div class="form-group">
            <label for="event_image">Event Image</label>
            <input class="form-control" name="event_image" id="event_image" type="file" placeholder="{{ $event->event_image }}" value="{{ $event->event_image }}">
          </div>

          <div class="form-group">
            <label for="slot">Slot</label>
            <input class="form-control" name="slot" id="slot" type="text" placeholder="{{ $event->slot }}" value="{{ $event->slot }}">
          </div>

          <div class="form-group">
            <label for="pricepool">Price Pool</label>
            <input class="form-control" name="pricepool" id="pricepool" type="text" placeholder="{{ $event->pricepool }}" value="{{ $event->pricepool }}">
          </div>

          <div class="form-group">
            <label for="isfree">Is free</label>
            <input class="form-control" name="isfree" id="isfree" type="text" placeholder="{{ $event->isfree }}" value="{{ $event->isfree }}">
          </div>

          <div class="form-group">
            <label for="detail">Detail</label>
            <input class="form-control" name="detail" id="detail" type="text" placeholder="{{ $event->detail }}" value="{{ $event->detail }}">
          </div>

          <div class="form-group">
            <label for="peraturan">Peraturan</label>
            <input class="form-control" name="peraturan" id="peraturan" type="text" placeholder="{{ $event->peraturan }}" value="{{ $event->peraturan }}">
          </div>

          <div class="form-group">
            <label for="start">Start</label>
            <input class="form-control" name="start" id="start" type="text" placeholder="{{ $event->start }}" value="{{ $event->start }}">
          </div>

          <div class="form-group">
            <label for="end">End</label>
            <input class="form-control" name="end" id="end" type="text" placeholder="{{ $event->end }}" value="{{ $event->end }}">
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