@extends('layouts.dashboard')
@section('title', 'Add detail event')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('event_inv_teams'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <h4 class="card-title">Invite teams</h4>
                <p class="card-description">
                    Invite teams untuk join events mu
                </p>
                <a class="btn btn-primary" href="/anggota/event_inv_teams/create/{{$id}}" title="Create a data"> 
                    Create
                </a>
                <div class="table-responsive">
                    <!-- seacrh event_inv_team -->
                    <x-search name="event_inv_team"></x-search>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Event</th>
                                <th>Squad</th>
                                <th>Status</th>
                                <th>Tanggal invite</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty event_inv_teams -->
                            @if($event_inv_teams->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            @foreach ($event_inv_teams as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->event_name}}</td>
                                <td>{{$data->squad_name}}</td>
                                <td>{{$data->status ? 'Diterima' : 'menunggu'}}</td>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/anggota/event_inv_teams/show/{{$data->id_event_inv_teams}}" title="show" class="badge badge-info">Show</a>
                                        <a href="/anggota/event_inv_teams/destroy/{{$data->id_event_inv_teams}}" class="badge badge-danger">Delete</a>
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
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('event_teams'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <h4 class="card-title">Event teams</h4>
                <p class="card-description">
                    Teams yang mengikuti event
                </p>
                <a class="btn btn-primary" href="/anggota/event_teams/create/{{$id}}" title="Create a data"> 
                    Create
                </a>
                <div class="table-responsive">
                    <!-- seacrh event_inv_team -->
                    <x-search name="event_team"></x-search>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Events</th>
                                <th>Squad</th>
                                <th>Status Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty event_inv_teams -->
                            @if($event_teams->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            @foreach ($event_teams as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->event_name}}</td>
                                <td>{{$data->squad_name}}</td>
                                <td><span class="badge badge-{{$data->ispaid == 1 ? 'success' : 'danger'}}"> {{$data->ispaid == 1 ? 'OKE' : 'TIDAK'}}</span></td>
                                <?php if ($data->paid_image == null) { ?>
                                    <td>Belum Upload</td>
                                <?php } else { ?>
                                    <td><a class="badge badge-success" href="{{env('ASSETS')}}/assets/images/{{$data->paid_image}}" target="_blank">Lihat Bukti</a>
                                    </td>
                                <?php } ?>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/anggota/home/squad/{{$data->squad_id }}" title="show" class="badge badge-info">Show</a>
                                        <a href="/anggota/event_teams/edit/{{$data->id_event_teams }}" class="badge badge-warning">Edit</a>
                                        <a href="/anggota/event_teams/destroy/{{$data->id_event_teams }}" class="badge badge-danger">Delete</a>
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
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('event_winner'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <h4 class="card-title">Events Winners</h4>
                <p class="card-description">
                    Pemenang Event
                </p>
                <a class="btn btn-primary" href="/anggota/event_winner/create/{{$id}}" title="Create a data"> 
                    Create
                </a>
                <div class="table-responsive">
                    <!-- seacrh event_winner -->
                    <x-search name="event_winner"></x-search>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Event</th>
                                <th>Squad</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- empty event_winner -->
                            @if($event_winner->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h4>Tidak ada data</h4>
                                </td>
                            </tr>
                            @endif
                            @foreach ($event_winner as $data)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->events->event_name}}</td>
                                <td>{{$data->squads->squad_name}}</td>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="/anggota/event_winner/show/{{$data->id_event_winner }}" title="show" class="badge badge-info">Show</a>
                                        <a href="/anggota/event_winner/edit/{{$data->id_event_winner }}" class="badge badge-warning">Edit</a>
                                        <a href="/anggota/event_winner/destroy/{{$data->id_event_winner }}" class="badge badge-danger">Delete</a>
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