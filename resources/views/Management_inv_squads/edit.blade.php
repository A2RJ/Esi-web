@extends('layouts.app')
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
                        <label for="id_management_inv_squad">id_management_inv_squad</label>
                        <input class="form-control" name="id_management_inv_squad" id="id_management_inv_squad" type="text" placeholder="{{ $management_inv_squads->id_management_inv_squad }}" value="{{ $management_inv_squads->id_management_inv_squad }}">
                    </div>

                    <div class="form-group">
                        <label for="management_id">management_id</label>
                        <input class="form-control" name="management_id" id="management_id" type="text" placeholder="{{ $management_inv_squads->management_id }}" value="{{ $management_inv_squads->management_id }}">
                    </div>

                    <div class="form-group">
                        <label for="squad_id">squad_id</label>
                        <input class="form-control" name="squad_id" id="squad_id" type="text" placeholder="{{ $management_inv_squads->squad_id }}" value="{{ $management_inv_squads->squad_id }}">
                    </div>

                    <div class="form-group">
                        <label for="created_at">created_at</label>
                        <input class="form-control" name="created_at" id="created_at" type="text" placeholder="{{ $management_inv_squads->created_at }}" value="{{ $management_inv_squads->created_at }}">
                    </div>

                    <div class="form-group">
                        <label for="updated_at">updated_at</label>
                        <input class="form-control" name="updated_at" id="updated_at" type="text" placeholder="{{ $management_inv_squads->updated_at }}" value="{{ $management_inv_squads->updated_at }}">
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection