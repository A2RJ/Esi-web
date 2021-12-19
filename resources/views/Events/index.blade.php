@extends('layouts.dashboard')
@section('title', 'events')

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

                <h4 class="card-title">Events</h4>
                <p class="card-description">
                    Daftar event yang telah dibuat
                </p>
                <div class="menu">
                    <a class="btn btn-primary" href="/events/create" title="Create a data">
                        Create events
                    </a>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Owner</th>
                                <th>Event Name</th>
                                <th>Game</th>
                                <th>Slot</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->owner->nama}}</td>
                                <td>{{$data->event_name}}</td>
                                <td>{{$data->game->game_name}}</td>
                                <td>{{$data->slot}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/events/setEvent/{{$data->id_event }}" title="show" class="badge badge-info">Detail</a>
                                        <a href="/events/show/{{$data->id_event }}" title="show" class="badge badge-info">Show</a>
                                        <a href="/events/edit/{{$data->id_event }}" class="badge badge-warning">Edit</a>
                                        <a href="/events/destroy/{{$data->id_event }}" class="badge badge-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection