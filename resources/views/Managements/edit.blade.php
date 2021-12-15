@extends('layouts.dashboard')
@section('title', 'managements')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New managements</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="/managements" title="Go back"> Batal </a>
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

                <form action="/managements/update/{{$management->id_management}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="form-group">
                        <label for="management_name">management_name</label>
                        <input class="form-control" name="management_name" id="management_name" type="text" placeholder="{{ $management->management_name }}" value="{{ $management->management_name }}">
                    </div>

                    <div class="form-group">
                        <label for="management_image">management_image</label>
                        <input class="form-control" name="management_image" id="management_image" type="text" placeholder="{{ $management->management_image }}" value="{{ $management->management_image }}">
                    </div>

                    <div class="form-group">
                        <label for="kontak">kontak</label>
                        <input class="form-control" name="kontak" id="kontak" type="text" placeholder="{{ $management->kontak }}" value="{{ $management->kontak }}">
                    </div>

                    <div class="form-group">
                        <label for="web_url">web_url</label>
                        <input class="form-control" name="web_url" id="web_url" type="text" placeholder="{{ $management->web_url }}" value="{{ $management->web_url }}">
                    </div>

                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input class="form-control" name="alamat" id="alamat" type="text" placeholder="{{ $management->alamat }}" value="{{ $management->alamat }}">
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