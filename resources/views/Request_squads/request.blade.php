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
                <h4 class="card-title">Request join squad</h4>
                <p class="card-description">
                    <!-- Add class <code>.table-hover</code> -->
                    Menu request join squad dari user
                </p>

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
                                        <a href="/squad_inv_players/show/{{$data->id_squad_inv_player }}" title="show" class="badge badge-info">Terima</a>
                                        <a href="/squad_inv_players/destroy/{{$data->id_squad_inv_player }}" class="badge badge-danger">Tolak</a>
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