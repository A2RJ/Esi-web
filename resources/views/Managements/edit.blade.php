@extends('layouts.app')
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

    <form action="/managements/update/{{$managements->id_management}}" method="POST">
        @csrf
       <!-- @method('PUT') -->

        
            <div class="form-group">
                <label for="id_management">id_management</label>
                <input class="form-control" name="id_management" id="id_management" type="text" placeholder="{{ $managements->id_management }}" value="{{ $managements->id_management }}">
            </div>
            
            <div class="form-group">
                <label for="user_id">user_id</label>
                <input class="form-control" name="user_id" id="user_id" type="text" placeholder="{{ $managements->user_id }}" value="{{ $managements->user_id }}">
            </div>
            
            <div class="form-group">
                <label for="management_name">management_name</label>
                <input class="form-control" name="management_name" id="management_name" type="text" placeholder="{{ $managements->management_name }}" value="{{ $managements->management_name }}">
            </div>
            
            <div class="form-group">
                <label for="management_image">management_image</label>
                <input class="form-control" name="management_image" id="management_image" type="text" placeholder="{{ $managements->management_image }}" value="{{ $managements->management_image }}">
            </div>
            
            <div class="form-group">
                <label for="kontak">kontak</label>
                <input class="form-control" name="kontak" id="kontak" type="text" placeholder="{{ $managements->kontak }}" value="{{ $managements->kontak }}">
            </div>
            
            <div class="form-group">
                <label for="web_url">web_url</label>
                <input class="form-control" name="web_url" id="web_url" type="text" placeholder="{{ $managements->web_url }}" value="{{ $managements->web_url }}">
            </div>
            
            <div class="form-group">
                <label for="alamat">alamat</label>
                <input class="form-control" name="alamat" id="alamat" type="text" placeholder="{{ $managements->alamat }}" value="{{ $managements->alamat }}">
            </div>
            
            <div class="form-group">
                <label for="created_at">created_at</label>
                <input class="form-control" name="created_at" id="created_at" type="text" placeholder="{{ $managements->created_at }}" value="{{ $managements->created_at }}">
            </div>
            
            <div class="form-group">
                <label for="updated_at">updated_at</label>
                <input class="form-control" name="updated_at" id="updated_at" type="text" placeholder="{{ $managements->updated_at }}" value="{{ $managements->updated_at }}">
            </div>
            
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
@endsection