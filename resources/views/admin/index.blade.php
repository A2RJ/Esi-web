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
                <a class="btn btn-primary" href="/anggota/admin/create" title="Create a data"> 
                    Create
                </a>

                <!-- search admin -->
                <x-search name="admin" />

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Jabatan</th>
                                <th>Instagram</th>
                                <th>Facebook</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($admin->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            @foreach ($admin as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->user->nama}}</td>
                                <td>{{$data->jabatan}}</td>
                                <td>{{$data->ig}}</td>
                                <td>{{$data->fb}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <!-- <a href="/anggota/admin/show/{{$data->id_admin }}" title="show" class="badge badge-info">Show</a> -->
                                        <a href="/anggota/admin/edit/{{$data->id_admin }}" class="badge badge-warning">Edit</a>
                                        <a href="/anggota/admin/destroy/{{$data->id_admin }}" class="badge badge-danger">Delete</a>
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