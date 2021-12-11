@extends('layouts.dashboard')
@section('title', 'request_squads')

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
                <h4 class="card-title">Request join</h4>
                <p class="card-description">
                    <!-- Add class <code>.table-hover</code> -->
                    Menu player request join squad
                </p>
                <a class="btn btn-success" href="/request_squads/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Tambah
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>player id</th>
                                <th>squad id</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($request_squads as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->player_id}}</td>
                                <td>{{$data->squad_id}}</td>
                                <td>{{$data->status}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/request_squads/show/{{$data->id_request_squad }}" title="show" class="badge badge-info">Show</a>
                                        <a href="/request_squads/edit/{{$data->id_request_squad }}" class="badge badge-warning">Edit</a>
                                        <a href="/request_squads/destroy/{{$data->id_request_squad }}" class="badge badge-danger">Delete</a>
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