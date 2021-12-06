@extends('layouts.app')
@section('title', 'squads')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New squads</h4>
                    <p class="card-description">
                    <a class="btn btn-primary" href="/squads" title="Go back"> Batal </a>
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

    <form action="/squads/update/{{$squads->id_squad}}" method="POST">
        @csrf
       <!-- @method('PUT') -->

        
            <div class="form-group">
                <label for="id_squad">id_squad</label>
                <input class="form-control" name="id_squad" id="id_squad" type="text" placeholder="{{ $squads->id_squad }}" value="{{ $squads->id_squad }}">
            </div>
            
            <div class="form-group">
                <label for="squad_name">squad_name</label>
                <input class="form-control" name="squad_name" id="squad_name" type="text" placeholder="{{ $squads->squad_name }}" value="{{ $squads->squad_name }}">
            </div>
            
            <div class="form-group">
                <label for="squad_leader">squad_leader</label>
                <input class="form-control" name="squad_leader" id="squad_leader" type="text" placeholder="{{ $squads->squad_leader }}" value="{{ $squads->squad_leader }}">
            </div>
            
            <div class="form-group">
                <label for="management_id">management_id</label>
                <input class="form-control" name="management_id" id="management_id" type="text" placeholder="{{ $squads->management_id }}" value="{{ $squads->management_id }}">
            </div>
            
            <div class="form-group">
                <label for="created_at">created_at</label>
                <input class="form-control" name="created_at" id="created_at" type="text" placeholder="{{ $squads->created_at }}" value="{{ $squads->created_at }}">
            </div>
            
            <div class="form-group">
                <label for="updated_at">updated_at</label>
                <input class="form-control" name="updated_at" id="updated_at" type="text" placeholder="{{ $squads->updated_at }}" value="{{ $squads->updated_at }}">
            </div>
            
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
@endsection