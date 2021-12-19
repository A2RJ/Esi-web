@extends('layouts.dashboard')
@section('title', 'managements')

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

                <h4 class="card-title">Management</h4>
                <p class="card-description">
                    Daftar Management yang terdaftar
                </p>
                <div class="menu">
                    <a class="btn btn-primary" href="/managements/create" title="Create a data"> <i class="fas fa-plus-circle"></i>
                        Create management
                    </a>
                    <a class="btn btn-primary" href="/management_inv_squads" title="Create a data"> <i class="fas fa-plus-circle"></i>
                        Invite squad
                    </a>
                    <a class="btn btn-primary" href="/request_managements/requestFromSquads" title="Create a data"> <i class="fas fa-plus-circle"></i>
                        Request join management
                    </a>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Management</th>
                                <th>Dibuat Pada</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($managements as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->management_name}}</td>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/managements/show/{{$data->id_management }}" title="show" class="badge badge-info">Show</a>
                                        <a href="/managements/edit/{{$data->id_management }}" class="badge badge-warning">Edit</a>
                                        <a href="/managements/destroy/{{$data->id_management }}" class="badge badge-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    {{ $managements->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection