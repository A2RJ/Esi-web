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
                <!-- class col-sm-8 offset-2 -->
                <form action="/events/store" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="games">Games</label>
                            <select class="form-control" id="game_id" name="game_id">
                                <option value="">-- Select Games --</option>
                                @foreach($games as $game)
                                <option value="{{ $game->id_game }}">{{ $game->game_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="event_name">Event Name</label>
                            <input type="text" class="form-control" name="event_name" id="event_name" placeholder="event_name">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="event_image">Event Image</label>
                            <input type="file" class="form-control" name="event_image" id="event_image" placeholder="event_image">
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="slot">Slot</label>
                            <input type="number" class="form-control" name="slot" id="slot" placeholder="slot">
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="price">Fee/Slot</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="price">
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="pricepool">Price Pool</label>
                            <input type="number" class="form-control" name="pricepool" id="pricepool" placeholder="pricepool">
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="isfree">Status Pembayaran</label>
                            <select class="form-control" id="isfree" name="isfree">
                                <option value="">Select</option>
                                <option value="1">Free</option>
                                <option value="0">Paid</option>
                            </select>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="detail">Detail</label> <br>
                            <textarea class="form-control" name="detail" id="detail" placeholder="detail"></textarea>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="peraturan">Peraturan</label>
                            <textarea class="form-control" name="peraturan" id="peraturan" rows="10" placeholder="peraturan"></textarea>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="start">Mulai event</label>
                            <input type="date" class="form-control" name="start" id="start" placeholder="start">
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="end">Selesai event</label>
                            <input type="date" class="form-control" name="end" id="end" placeholder="end">
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection