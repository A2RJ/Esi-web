@extends('layouts.dashboard')
@section('title', 'management_inv_squads')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New management_inv_squads</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="/management_inv_squads" title="Go back"> Batal </a>
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

                <form action="/management_inv_squads/update/{{$management_inv_squads->id_management_inv_squad}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="form-group">
                        <label for="management_id">management_id</label>
                        <input class="form-control" name="management_id" id="management_id" type="text" placeholder="{{ $management_inv_squads->management_id }}" value="{{ $management_inv_squads->management_id }}">
                    </div>

                   <!-- looping squads with select -->
                    <div class="form-group">
                        <label for="squad_id">squad_id</label>
                        <select class="form-control" name="squad_id" id="squad_id">
                            <option>-- Pilih Squad --</option>
                           @foreach($squads as $squad)
                            <option value="{{ $squad->id_squad }}" {{ $squad->id_squad == $management_inv_squads->squad_id ? 'selected' : '' }}>{{ $squad->squad_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection