@extends('layouts.app')
@section('title', 'event_winner')

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
                <h4 class="card-title">Hoverable Table</h4>
                <p class="card-description">
                Add class <code>.table-hover</code>
                </p>
                 <a class="btn btn-success" href="event_winner/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
            Tambah
            </a>
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>id_event_winner</th><th>event_id</th><th>squad_id</th><th>created_at</th><th>updated_at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                  @foreach ($event_winner as $data)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$data->id_event_winner}}</td><td>{{$data->event_id}}</td><td>{{$data->squad_id}}</td><td>{{$data->created_at}}</td><td>{{$data->updated_at}}</td>
                        <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                        <a href="event_winner/show/{{$data->id_event_winner }}" title="show" class="badge badge-info">Show</a>
                        <a href="event_winner/edit/{{$data->id_event_winner }}" class="badge badge-warning">Edit</a>
                        <a href="event_winner/destroy/{{$data->id_event_winner }}" class="badge badge-danger">Delete</a>
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