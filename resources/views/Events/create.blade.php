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
    <form action="/events/store" method="POST" class="forms-sample">
        @csrf

            
            <div class="form-group">
                <label for="id_event">id_event</label>
                <input type="text" class="form-control" name="id_event" id="id_event" placeholder="id_event">
            </div>
            
            <div class="form-group">
                <label for="game_id">game_id</label>
                <input type="text" class="form-control" name="game_id" id="game_id" placeholder="game_id">
            </div>
            
            <div class="form-group">
                <label for="user_id">user_id</label>
                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="user_id">
            </div>
            
            <div class="form-group">
                <label for="event_name">event_name</label>
                <input type="text" class="form-control" name="event_name" id="event_name" placeholder="event_name">
            </div>
            
            <div class="form-group">
                <label for="event_image">event_image</label>
                <input type="text" class="form-control" name="event_image" id="event_image" placeholder="event_image">
            </div>
            
            <div class="form-group">
                <label for="slot">slot</label>
                <input type="text" class="form-control" name="slot" id="slot" placeholder="slot">
            </div>
            
            <div class="form-group">
                <label for="pricepool">pricepool</label>
                <input type="text" class="form-control" name="pricepool" id="pricepool" placeholder="pricepool">
            </div>
            
            <div class="form-group">
                <label for="detail">detail</label>
                <input type="text" class="form-control" name="detail" id="detail" placeholder="detail">
            </div>
            
            <div class="form-group">
                <label for="peraturan">peraturan</label>
                <input type="text" class="form-control" name="peraturan" id="peraturan" placeholder="peraturan">
            </div>
            
            <div class="form-group">
                <label for="start">start</label>
                <input type="text" class="form-control" name="start" id="start" placeholder="start">
            </div>
            
            <div class="form-group">
                <label for="end">end</label>
                <input type="text" class="form-control" name="end" id="end" placeholder="end">
            </div>
            
            <div class="form-group">
                <label for="created_at">created_at</label>
                <input type="text" class="form-control" name="created_at" id="created_at" placeholder="created_at">
            </div>
            
            <div class="form-group">
                <label for="updated_at">updated_at</label>
                <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="updated_at">
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

    </form>
@endsection