@extends('layouts.dashboard')
@section('title', 'event_inv_teams')

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

                <h4 class="card-title">Invite teams</h4>
                <p class="card-description">
                    Invite teams untuk join events mu
                </p>
                <a class="btn btn-primary" href="/anggota/event_inv_teams/create" title="Create a data"> 
                    Create
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Event</th>
                                <th>Squad</th>
                                <th>Tanggal invite</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event_inv_teams as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->event_name}}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->status ? 'Diterima' : 'Ditolak'}}</td>
                                <td>{{$data->created_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/anggota/event_inv_teams/show/{{$data->id_event_inv_teams}}" title="show" class="badge badge-info">Show</a>
                                        <a href="/anggota/event_inv_teams/edit/{{$data->id_event_inv_teams}}" class="badge badge-warning">Edit</a>
                                        <a href="/anggota/event_inv_teams/destroy/{{$data->id_event_inv_teams}}" class="badge badge-danger">Delete</a>
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