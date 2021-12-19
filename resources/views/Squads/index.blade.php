@extends('layouts.dashboard')
@section('title', 'squads')

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

                <h4 class="card-title">Squads</h4>
                <p class="card-description">
                    Daftar squad yang terdaftar
                </p>
                <div class="menu">
                    <a class="btn btn-primary" href="/squads/create" title="Create a data">
                        Create squad
                    </a>
                    <a class="btn btn-primary" href="/event_inv_teams/invite" title="Create a data">
                        Event invite
                    </a>
                    <!-- <a class="btn btn-primary" href="/squad_inv_players" title="Create a data">
                        Invite player
                    </a>
                    <a class="btn btn-primary" href="/request_squads/requestFromPlayers" title="Create a data">
                        Request join
                    </a> -->
                    <a class="btn btn-primary" href="/management_inv_squads/invite" title="Create a data">
                        Management invite
                    </a>
                    <a class="btn btn-primary" href="/request_managements" title="Create a data">
                        Request management
                    </a>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Squad Name</th>
                                <th>Squad Leader</th>
                                <th>Management Id</th>
                                <th>Dibuat Pada</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($squads as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->leader->ingame_name}}</td>
                                <td>{{$data->management ? $data->management->management_name : 'Tidak join management'}}</td>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/squads/setSquad/{{$data->id_squad }}" title="show" class="badge badge-info">Detail</a>
                                        <a href="/squads/show/{{$data->id_squad }}" title="show" class="badge badge-info">Show</a>
                                        <a href="/squads/edit/{{$data->id_squad }}" class="badge badge-warning">Edit</a>
                                        <a href="/squads/destroy/{{$data->id_squad }}" class="badge badge-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    {{ $squads->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection