@extends('layouts.dashboard')
@section('title', 'event_teams')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New event teams</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/anggota/event_teams" title="Go back"> Batal </a>
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
                <form action="/anggota/events/storeJoin" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <!-- looping event -->
                    <div class="form-group">
                        <label for="event_id">Event</label>
                        <select class="form-control" name="event_id" id="event_id">
                            <option value="">Pilih Event</option>
                            <option value="{{$event->id_event}}" selected>{{ $event->event_name }}</option>
                        </select>
                    </div>

                    <!-- looping $squads -->
                    <div class="form-group">
                        <label for="id_squad">Squad</label>
                        <select class="form-control" name="squad_id" id="squad_id">
                            @foreach($squads as $squad)
                            <option value="{{ $squad->id_squad }}">{{ $squad->squad_name }}</option>
                            @endforeach
                            <!-- empty squads -->
                            @if($squads->isEmpty())
                            <option value="">Tidak ada squad</option>
                            @endif
                        </select>
                    </div>

                    <!-- upload file paid_image -->
                    <div class="form-group">
                        <label for="paid_image">Paid Image</label>
                        <input type="file" class="form-control" name="paid_image" id="paid_image">
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