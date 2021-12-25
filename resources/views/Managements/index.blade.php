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

                <h4 class="card-title">{{ Request::is('managements') ? 'All Management' : 'My Management' }}</h4>
                <p class="card-description">
                    Daftar Management yang terdaftar
                </p>

                @if(Request::is('managements/managements'))
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
                @endif

                <div class="table-responsive mt-4">
                    <!-- search management -->
                    <x-search name="management"></x-search>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Management Name</th>
                                <th>Dibuat Pada</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty management -->
                            @if($managements->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            @foreach ($managements as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->management_name}}</td>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/managements/show/{{$data->id_management }}" title="show" class="badge badge-info">Show</a>
                                        @if(Request::is('managements/managements'))
                                        <a href="/managements/edit/{{$data->id_management }}" class="badge badge-warning">Edit</a>
                                        <a href="/managements/destroy/{{$data->id_management }}" class="badge badge-danger">Delete</a>
                                        @endif
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