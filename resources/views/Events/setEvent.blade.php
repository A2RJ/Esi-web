@extends('layouts.dashboard')
@section('title', 'Add detail event')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('event_inv_teams'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <h4 class="card-title">Invite teams</h4>
                <p class="card-description">
                    Invite teams untuk join events mu
                </p>
                <a class="btn btn-primary" href="/event_inv_teams/create/{{$id}}" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Tambah
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Event</th>
                                <th>Squad</th>
                                <th>Status</th>
                                <th>Tanggal invite</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event_inv_teams as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->event_name}}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->status ? 'Diterima' : 'menunggu'}}</td>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/event_inv_teams/show/{{$data->id_event_inv_teams}}" title="show" class="badge badge-info">Show</a>
                                        <a href="/event_inv_teams/edit/{{$data->id_event_inv_teams}}" class="badge badge-warning">Edit</a>
                                        <a href="/event_inv_teams/destroy/{{$data->id_event_inv_teams}}" class="badge badge-danger">Delete</a>
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
                @if ($message = Session::get('event_teams'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <h4 class="card-title">Event teams</h4>
                <p class="card-description">
                    Teams yang mengikuti event
                </p>
                <a class="btn btn-primary" href="/event_teams/create/{{$id}}" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Tambah
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Events</th>
                                <th>Squad</th>
                                <th>Is Paid</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event_teams as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->event_name}}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->ispaid == 1 ? 'YA' : 'TIDAK'}}</td>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <!-- <a href="/event_teams/show/{{$data->id_event_teams }}" title="show" class="badge badge-info">Show</a> -->
                                        <a href="/event_teams/edit/{{$data->id_event_teams }}" class="badge badge-warning">Edit</a>
                                        <a href="/event_teams/destroy/{{$data->id_event_teams }}" class="badge badge-danger">Delete</a>
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
                @if ($message = Session::get('event_winner'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <h4 class="card-title">Events Winners</h4>
                <p class="card-description">
                    Pemenang Event
                </p>
                <a class="btn btn-primary" href="/event_winner/create/{{$id}}" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Tambah
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Event</th>
                                <th>Squad</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event_winner as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->events->event_name}}</td>
                                <td>{{$data->squads->squad_name}}</td>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/event_winner/show/{{$data->id_event_winner }}" title="show" class="badge badge-info">Show</a>
                                        <a href="/event_winner/edit/{{$data->id_event_winner }}" class="badge badge-warning">Edit</a>
                                        <a href="/event_winner/destroy/{{$data->id_event_winner }}" class="badge badge-danger">Delete</a>
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