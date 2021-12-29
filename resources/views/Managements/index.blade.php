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

                <h4 class="card-title">{{ Request::is('anggota/managements') ? 'All Management' : 'My Management' }}</h4>
                <p class="card-description">
                    Daftar Management yang terdaftar
                </p>

                @if(Request::is('anggota/managements/managements'))
                <div class="menu">
                    <a class="btn btn-primary" href="/anggota/managements/create" title="Create a data"> 
                        Create management
                    </a>
                    <a class="btn btn-primary" href="/anggota/management_inv_squads" title="Create a data"> 
                        Invite squad
                    </a>
                    <a class="btn btn-primary" href="/anggota/request_managements/requestFromSquads" title="Create a data"> 
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
                                        <a href="/anggota/managements/show/{{$data->id_management }}" title="show" class="badge badge-info">Show</a>
                                        @if(Request::is('anggota/managements/managements'))
                                        <a href="/anggota/managements/edit/{{$data->id_management }}" class="badge badge-warning">Edit</a>
                                        <a href="/anggota/managements/destroy/{{$data->id_management }}" class="badge badge-danger">Delete</a>
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