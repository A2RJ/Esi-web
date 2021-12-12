@extends('layouts.dashboard')
@section('title', 'admin')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New admin</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="/admin" title="Go back"> Batal </a>
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
                <form action="/admin/store" method="POST" class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="jabatan">jabatan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="jabatan">
                    </div>

                    <div class="form-group">
                        <label for="ig">ig</label>
                        <input type="text" class="form-control" name="ig" id="ig" placeholder="ig">
                    </div>

                    <div class="form-group">
                        <label for="fb">fb</label>
                        <input type="text" class="form-control" name="fb" id="fb" placeholder="fb">
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