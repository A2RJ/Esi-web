@extends('layouts.dashboard')
@section('title', 'admin')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <h4 class="card-title">Admin</h4>
                <p class="card-description">
                   Kelola admin yang terdaftar
                </p>
                <a class="btn btn-primary" href="/admin/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Create
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jabatan</th>
                                <th>Instagram</th>
                                <th>Facebook</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admin as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->jabatan}}</td>
                                <td>{{$data->ig}}</td>
                                <td>{{$data->fb}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/admin/show/{{$data->id_admin }}" title="show" class="badge badge-info">Show</a>
                                        <a href="/admin/edit/{{$data->id_admin }}" class="badge badge-warning">Edit</a>
                                        <a href="/admin/destroy/{{$data->id_admin }}" class="badge badge-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection