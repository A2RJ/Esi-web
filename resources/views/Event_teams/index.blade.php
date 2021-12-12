@extends('layouts.dashboard')
@section('title', 'event_teams')

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

                <h4 class="card-title">Event teams</h4>
                <p class="card-description">
                    Teams yang mengikuti event
                </p>
                <a class="btn btn-success" href="/event_teams/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Tambah
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Events</th>
                                <th>Squad</th>
                                <th>isfree</th>
                                <th>ispaid</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event_teams as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->event_name}}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->isfree == 1 ? 'YA' : 'TIDAK'}}</td>
                                <td>{{$data->ispaid == 1 ? 'YA' : 'TIDAK'}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td>
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

@endsection