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
                <h4 class="card-title">Request join to squads</h4>
                <p class="card-description">
                    Menu player request join squad
                </p>
                <a class="btn btn-primary" href="/request_squads/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Create
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <Th>#</th>
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
                                <td>{{$data->players->ingame_name}}</td>
                                <td>{{$data->squads->squad_name}}</td>
                                <td>{{$data->status ? 'Accepted' : 'Waiting'}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/request_squads/destroy/{{$data->id_request_squad }}" class="badge badge-danger">{{$data->status ? 'Delete' : 'Batal'}}</a>
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