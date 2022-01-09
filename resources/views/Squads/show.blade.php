@extends('layouts.dashboard')
@section('title', 'Squads')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('deleteFromSquad'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <h4 class="card-title">Daftar player</h4>
                <p class="card-description">
                    Daftar player
                </p>
                <div class="table-responsive">
                    <!-- search player -->
                    <x-search name="player"></x-search>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <Th>#</th>
                                <Th>User</th>
                                <Th>Squad</th>
                                <Th>Game</th>
                                <Th>Sebagai player</th>
                                <Th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty players -->
                            @if($players->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            @foreach ($players as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->ingame_name}}</td>
                                <td>{{$data->squad ? $data->squad->squad_name : 'Tidak join squad'}}</td>
                                <td>{{$data->game->game_name}}</td>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/anggota/home/player/{{$data->id_player }}" title="show" class="badge badge-info">Show</a>
                                        @if($data->id_player !== $data->squad->squad_leader)
                                        <a href="/anggota/squads/destroyFromSquad/{{$data->id_player }}" class="badge badge-danger">Delete from squad</a>
                                        @endif
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

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <h4 class="card-title">Invite player</h4>
                <p class="card-description">
                    Menu untuk invite player
                </p>
                <a class="btn btn-primary" href="/anggota/squad_inv_players/create/{{$id}}" title="Create a data"> 
                    Create
                </a>
                <div class="table-responsive">
                    <!-- search squad_inv_player -->
                    <x-search name="squad_inv_player"></x-search>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <Th>#</th>
                                <Th>Squad</th>
                                <Th>Player</th>
                                <Th>Status</th>
                                <Th>Diinvite Pada</th>
                                <Th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty squad_inv_players -->
                            @if($squad_inv_players->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            @foreach ($squad_inv_players as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->ingame_name}}</td>
                                <td>{{$data->status == 0 ? 'Waiting' : 'Accepted'}}</td>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/anggota/squad_inv_players/destroy/{{$data->id_squad_inv_player }}" class="badge badge-danger">{{$data->status ? 'Delete' : 'Batal'}}</a>
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

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Request join squad</h4>
                <p class="card-description">
                    Daftar request join squad dari player
                </p>

                <div class="table-responsive">
                    <!-- search request_squad -->
                    <x-search name="request_squad"></x-search>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <Th>#</th>
                                <Th>Player</th>
                                <Th>Squad</th>
                                <Th>Status</th>
                                <Th>Diajukan Pada</th>
                                <Th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty request_squads -->
                            @if($request_squads->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            @foreach ($request_squads as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->ingame_name}}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->status ? 'Accepted' : 'Waiting'}}</td>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <?php if ($data->status) { ?>
                                            <a href="/anggota/request_squads/destroy/{{$data->id_request_squad }}" class="badge badge-danger">Delete</a>
                                        <?php } else { ?>
                                            <a href="/anggota/request_squads/terima/{{$data->id_request_squad }}" title="terima" class="badge badge-info">Terima</a>
                                            <a href="/anggota/request_squads/destroy/{{$data->id_request_squad }}" class="badge badge-danger">Tolak</a>
                                        <?php } ?>
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