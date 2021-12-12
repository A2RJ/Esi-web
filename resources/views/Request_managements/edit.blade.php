@extends('layouts.dashboard')
@section('title', 'request_managements')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New request to managements</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="/request_managements" title="Go back"> Batal </a>
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

                <form action="/request_managements/update/{{$request_managements->id_request_management}}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="form-group">
                        <label for="squad_id">squad id</label>
                        <input class="form-control" name="squad_id" id="squad_id" type="text" placeholder="{{ $request_managements->squad_id }}" value="{{ $request_managements->squad_id }}">
                    </div>

                    <div class="form-group">
                        <label for="management_id">management id</label>
                        <input class="form-control" name="management_id" id="management_id" type="text" placeholder="{{ $request_managements->management_id }}" value="{{ $request_managements->management_id }}">
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