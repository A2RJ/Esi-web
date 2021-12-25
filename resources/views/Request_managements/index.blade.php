@extends('layouts.dashboard')
@section('title', 'request_managements')

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
                <h4 class="card-title">Request Join Management</h4>
                <p class="card-description">
                    Daftar request join yang masih dalam proses
                </p>
                <a class="btn btn-primary" href="/request_managements/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Create
                </a>
                <div class="table-responsive">
                    <!-- search -->
                    <x-search name="request_management"></x-search>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>squad id</th>
                                <th>management id</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty request_managements -->
                            @if($request_managements->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            @foreach ($request_managements as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->management_name}}</td>
                                <td>{{$data->status ? 'Diterima' : 'Waiting' }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/request_managements/destroy/{{$data->id_request_management }}" class="badge badge-danger">Delete</a>
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