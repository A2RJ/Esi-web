@extends('layouts.dashboard')
@section('title', 'event_teams')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit New event_teams</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/event_teams" title="Go back"> Batal </a>
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

                <form action="/events/updateJoin/{{$event_teams->id_event_teams}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <!-- @method('PUT') -->

                    <!-- looping event -->
                    <div class="form-group">
                        <label for="event_id">Event</label>
                        <select class="form-control" name="event_id" id="event_id">
                            <option value="{{ $event_teams->event_id }}" selected>{{ $event_teams->event_name }}</option>
                        </select>
                    </div>

                    <!-- looping event_teamss -->
                    <div class="form-group">
                        <label for="id_squads">Squads</label>
                        <select class="form-control" name="squad_id" id="squad_id">
                            <option value="{{ $event_teams->squad_id }}" selected>{{ $event_teams->squad_name }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="paid_image">Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="paid_image" id="paid_image">
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