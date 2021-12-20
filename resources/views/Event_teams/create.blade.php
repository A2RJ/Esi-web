@extends('layouts.dashboard')
@section('title', 'event_teams')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New event teams</h4>
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
                <form action="/event_teams/store" method="POST" class="forms-sample">
                    @csrf
                    <!-- looping event -->
                    <div class="form-group">
                        <label for="event_id">Event</label>
                        <select class="form-control" name="event_id" id="event_id">
                            <option value="{{$events->id_event}}" selected>{{ $events->event_name }}</option>
                        </select>
                    </div>

                    <!-- looping $squads -->
                    <div class="form-group">
                        <label for="id_squad">Squad</label>
                        <select class="form-control" name="squad_id" id="squad_id">
                            <option value="">Select Squad</option>
                            @foreach($squads as $squad)
                            <option value="{{ $squad->id_squad }}">{{ $squad->squad_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ispaid">Status pembayaran</label>
                        <select class="form-control" name="ispaid" id="ispaid">
                            <option value="">Pilih</option>
                            <option value="0">Belum Bayar</option>
                            <option value="1">Sudah Bayar</option>
                        </select>
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