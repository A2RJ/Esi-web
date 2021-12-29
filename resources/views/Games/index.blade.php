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
                    <a class="btn btn-primary" href="/anggota/games/create" title="Create a data"> 
                        Create game
                    </a>
                    <a class="btn btn-primary" href="/anggota/game_categories" title="Create a data"> 
                        Kategori game
                    </a>
                </div>
                <div class="table-responsive">
                    <!-- search -->
                    <x-search name="game"></x-search>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <Th>Game Name</th>
                                <Th>Category</th>
                                <Th>Game Image</th>
                                <Th>Created_At</th>
                                <Th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty games -->
                            @if($games->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            @foreach ($games as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->game_name}}</td>
                                <td>{{$data->category->game_category}}</td>
                                <td><a class="badge badge-success" href="/anggota/public/assets/images/{{$data->game_image}}" target="_blank">Image</a></td>
                                <td>{{$data->created_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <!-- <a href="/anggota/games/show/{{$data->id_game }}" title="show" class="badge badge-info">Show</a> -->
                                        <a href="/anggota/games/edit/{{$data->id_game }}" class="badge badge-warning">Edit</a>
                                        <a href="/anggota/games/destroy/{{$data->id_game }}" class="badge badge-danger">Delete</a>
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