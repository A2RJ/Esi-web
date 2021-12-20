@extends('layouts.dashboard')
@section('title', 'game_categories')

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

                <h4 class="card-title">Game Category</h4>
                <p class="card-description">
                    Daftar kategori game
                </p>
                <a class="btn btn-primary" href="/game_categories/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Create
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Game Category</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($game_categories as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->game_category}}</td>
                                <td>{{$data->created_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <!-- <a href="/game_categories/show/{{$data->id_game_category }}" title="show" class="badge badge-info">Show</a> -->
                                        <a href="/game_categories/edit/{{$data->id_game_category }}" class="badge badge-warning">Edit</a>
                                        <a href="/game_categories/destroy/{{$data->id_game_category }}" class="badge badge-danger">Delete</a>
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