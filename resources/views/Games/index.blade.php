@extends('layouts.dashboard')
@section('title', 'games')

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

                <h4 class="card-title">Games</h4>
                <p class="card-description">
                    Daftar game
                </p>
                <div class="menu">
                    <a class="btn btn-primary" href="/games/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                        Tambah game
                    </a>
                    <a class="btn btn-primary" href="/game_categories" title="Create a data"> <i class="fas fa-plus-circle"></i>
                        Kategori game
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>game_name</th>
                                <th>category</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($games as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->game_name}}</td>
                                <td>{{$data->category->game_category}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/games/show/{{$data->id_game }}" title="show" class="badge badge-info">Show</a>
                                        <a href="/games/edit/{{$data->id_game }}" class="badge badge-warning">Edit</a>
                                        <a href="/games/destroy/{{$data->id_game }}" class="badge badge-danger">Delete</a>
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