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

                <h4 class="card-title">{{Request::is('anggota/squads/squads') ? 'My Squads' : 'All Squads' }}</h4>
                <p class="card-description">
                    Daftar squad yang terdaftar
                </p>

                @if(Request::is('anggota/squads/squads'))
                <div class="menu">
                    <a class="btn btn-primary" href="/anggota/squads/create" title="Create a data">
                        Create squad
                    </a>
                    <a class="btn btn-primary" href="/anggota/event_inv_teams/invite" title="Create a data">
                        Event invite
                    </a>
                    <a class="btn btn-primary" href="/anggota/management_inv_squads/invite" title="Create a data">
                        Management invite
                    </a>
                    <a class="btn btn-primary" href="/anggota/request_managements" title="Create a data">
                        Request management
                    </a>
                </div>
                @endif

                <div class="table-responsive mt-4">

                    <!-- search bar events -->
                    <x-search name="squad"></x-search>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Squad Name</th>
                                <th>Squad Leader</th>
                                <th>Management Id</th>
                                <th>Dibuat Pada</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty squads -->
                            @if($squads->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            
                            @foreach ($squads as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->leader->ingame_name}}</td>
                                <td>{{$data->management ? $data->management->management_name : 'Tidak join management'}}</td>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/anggota/squads/show/{{$data->id_squad }}" title="show" class="badge badge-info">Show</a>
                                        @if(Request::is('anggota/squads/squads'))
                                        <a href="/anggota/squads/setSquad/{{$data->id_squad }}" title="show" class="badge badge-info">Detail</a>
                                        <a href="/anggota/squads/edit/{{$data->id_squad }}" class="badge badge-warning">Edit</a>
                                        <a href="/anggota/squads/destroy/{{$data->id_squad }}" class="badge badge-danger">Delete</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    {{ $squads->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection