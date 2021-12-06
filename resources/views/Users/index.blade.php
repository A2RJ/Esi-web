@extends('layouts.app')
@section('title', 'users')

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

                <h4 class="card-title">Hoverable Table</h4>
                <p class="card-description">
                    Add class <code>.table-hover</code>
                </p>
                <a class="btn btn-success" href="/users/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Tambah
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>id_user</th>
                                <th>user_role</th>
                                <th>email</th>
                                <th>password</th>
                                <th>kontak</th>
                                <th>alamat</th>
                                <th>gender</th>
                                <th>user_image</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->id_user}}</td>
                                <td>{{$data->user_role}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->password}}</td>
                                <td>{{$data->kontak}}</td>
                                <td>{{$data->alamat}}</td>
                                <td>{{$data->gender}}</td>
                                <td>{{$data->user_image}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/users/show/{{$data->id_user }}" title="show" class="badge badge-info">Show</a>
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