@extends('layouts.dashboard')
@section('title', 'players')

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
                <a class="btn btn-success" href="/players/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Tambah
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>user</th>
                                <th>squad</th>
                                <th>game</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->user->nama}}</td>
                                <td>{{$data->squad->squad_name}}</td>
                                <td>{{$data->game->game_name}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/players/show/{{$data->id_player }}" title="show" class="badge badge-info">Show</a>
                                        <a href="/players/edit/{{$data->id_player }}" class="badge badge-warning">Edit</a>
                                        <a href="/players/destroy/{{$data->id_player }}" class="badge badge-danger">Delete</a>
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