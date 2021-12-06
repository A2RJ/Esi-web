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
                <form action="/management_inv_squads/store" method="POST" class="forms-sample">
                    @csrf


                    <div class="form-group">
                        <label for="id_management_inv_squad">id_management_inv_squad</label>
                        <input type="text" class="form-control" name="id_management_inv_squad" id="id_management_inv_squad" placeholder="id_management_inv_squad">
                    </div>

                    <div class="form-group">
                        <label for="management_id">management_id</label>
                        <input type="text" class="form-control" name="management_id" id="management_id" placeholder="management_id">
                    </div>

                    <div class="form-group">
                        <label for="squad_id">squad_id</label>
                        <input type="text" class="form-control" name="squad_id" id="squad_id" placeholder="squad_id">
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