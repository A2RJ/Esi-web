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
                <form action="/managements/store" method="POST" class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="user_id">user_id</label>
                        <input type="text" class="form-control" name="user_id" id="user_id" placeholder="user_id">
                    </div>

                    <div class="form-group">
                        <label for="management_name">management_name</label>
                        <input type="text" class="form-control" name="management_name" id="management_name" placeholder="management_name">
                    </div>

                    <div class="form-group">
                        <label for="management_image">management_image</label>
                        <input type="text" class="form-control" name="management_image" id="management_image" placeholder="management_image">
                    </div>

                    <div class="form-group">
                        <label for="kontak">kontak</label>
                        <input type="text" class="form-control" name="kontak" id="kontak" placeholder="kontak">
                    </div>

                    <div class="form-group">
                        <label for="web_url">web_url</label>
                        <input type="text" class="form-control" name="web_url" id="web_url" placeholder="web_url">
                    </div>

                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
                @endsection