@extends('layouts.dashboard')
@section('title', 'managements')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New managements</h4>
                <!-- <p class="card-description">
                    <a class="btn btn-primary" href="/managements" title="Go back"> Batal </a>
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
                <form action="/managements/store" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="management_name">Management Name</label>
                            <input type="text" class="form-control" name="management_name" id="management_name" placeholder="management_name">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="management_image">Management Image</label>
                            <input type="file" class="form-control" name="management_image" id="management_image" placeholder="management_image">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="kontak">Kontak</label>
                            <input type="text" class="form-control" name="kontak" id="kontak" placeholder="kontak">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="web_url">Web Url</label>
                            <input type="text" class="form-control" name="web_url" id="web_url" placeholder="web_url">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat">
                        </div>
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