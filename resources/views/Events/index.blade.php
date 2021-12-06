@extends('layouts.app')
@section('title', 'events')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <h4 class="card-title">Hoverable Table</h4>
                <p class="card-description">
                    Add class <code>.table-hover</code>
                </p>
                <a class="btn btn-success" href="/events/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Tambah
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>id_event</th>
                                <th>game_id</th>
                                <th>user_id</th>
                                <th>event_name</th>
                                <th>event_image</th>
                                <th>slot</th>
                                <th>pricepool</th>
                                <th>detail</th>
                                <th>peraturan</th>
                                <th>start</th>
                                <th>end</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->id_event}}</td>
                                <td>{{$data->game_id}}</td>
                                <td>{{$data->user_id}}</td>
                                <td>{{$data->event_name}}</td>
                                <td>{{$data->event_image}}</td>
                                <td>{{$data->slot}}</td>
                                <td>{{$data->pricepool}}</td>
                                <td>{{$data->detail}}</td>
                                <td>{{$data->peraturan}}</td>
                                <td>{{$data->start}}</td>
                                <td>{{$data->end}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
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
            </div>
        </div>
    </div>
</div>

@endsection