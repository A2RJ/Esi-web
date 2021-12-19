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
                    Squadmu telah diinvite untuk bergabung di event ini.
                </p>
                <a class="btn btn-primary" href="/event_inv_teams/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Create
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Event</th>
                                <th>Squad</th>
                                <th>Tanggal Invite</th>
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
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->status ? 'Diterima' : 'Ditolak'}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <?php if ($data->status) { ?>
                                            <a href="/event_inv_teams/destroy/{{$data->id_event_inv_teams}}" class="badge badge-danger">Delete</a>
                                        <?php } else { ?>
                                            <a href="/event_inv_teams/terima/{{$data->id_event_inv_teams}}" class="badge badge-warning">Terima</a>
                                            <a href="/event_inv_teams/destroy/{{$data->id_event_inv_teams}}" class="badge badge-danger">Tolak</a>
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