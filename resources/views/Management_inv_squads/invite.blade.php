@extends('layouts.dashboard')
@section('title', 'management_inv_squads')

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

                <h4 class="card-title">Invite From Management</h4>
                <p class="card-description">
                    Daftar management yang meminta untuk bergabung dengan management nya
                </p>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Management</th>
                                <Th>Squad</th>
                                <Th>Tanggal Invite</th>
                                <Th>Status</th>
                                <Th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($management_inv_squads as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->management_name}}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->status ? 'Accepted' : 'Waiting'}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <?php if ($data->status) { ?>
                                            <a href="/management_inv_squads/destroy/{{$data->id_management_inv_squad }}" class="badge badge-danger">Delete</a>
                                        <?php } else { ?>
                                            <a href="/management_inv_squads/terima/{{$data->id_management_inv_squad }}" class="badge badge-info">Terima</a>
                                            <a href="/management_inv_squads/destroy/{{$data->id_management_inv_squad }}" class="badge badge-danger">Tolak</a>
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