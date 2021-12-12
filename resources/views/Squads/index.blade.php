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
                <a class="btn btn-success" href="/squads/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                    Tambah
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th> 
                                <th>squad_name</th>
                                <th>squad_leader</th>
                                <th>management_id</th>
                                <th>created_at</th>
                                <th>updated_at</th>
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
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
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
            </div>
        </div>
    </div>
</div>

@endsection