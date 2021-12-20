@extends('layouts.dashboard')
@section('title', 'users')

@section('content')
<div class="row">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Users</h4>
                <p class="card-description">
                    Daftar user yang terdaftar di sistem
                </p>
                <a class="btn btn-primary" href="/users/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Create
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Role</th>
                                <th>Nama</th>
                                <th>Tanggal Daftar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->user_role}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->created_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <!-- <a href="/users/show/{{$data->id_user }}" title="show" class="badge badge-info">Show</a> -->
                                        <a href="/users/edit/{{$data->id_user }}" class="badge badge-warning">Edit</a>
                                        <a href="/users/destroy/{{$data->id_user }}" class="badge badge-danger">Delete</a>
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