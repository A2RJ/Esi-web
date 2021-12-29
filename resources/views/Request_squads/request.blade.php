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
                    Daftar request join squad dari player
                </p>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <Th>Player</th>
                                <Th>Squad</th>
                                <Th>Status</th>
                                <Th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($request_squads as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->ingame_name}}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->status ? 'Accepted' : 'Waiting'}}</td>
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