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
                <a class="btn btn-primary" href="/anggota/game_categories/create" title="Create a data"> 
                    Create
                </a>
                <div class="table-responsive">
                    <!-- search -->
                    <x-search name="game_category"></x-search>
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
                            <!-- empty game_categories -->
                            @if($game_categories->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            @foreach ($game_categories as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->game_category}}</td>
                                <td>{{$data->created_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <!-- <a href="/anggota/game_categories/show/{{$data->id_game_category }}" title="show" class="badge badge-info">Show</a> -->
                                        <a href="/anggota/game_categories/edit/{{$data->id_game_category }}" class="badge badge-warning">Edit</a>
                                        <a href="/anggota/game_categories/destroy/{{$data->id_game_category }}" class="badge badge-danger">Delete</a>
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