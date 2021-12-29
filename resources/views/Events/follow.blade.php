@extends('layouts.dashboard')
@section('title', 'event_teams')

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

                <h4 class="card-title">Event</h4>
                <p class="card-description">
                    Daftar event yang anda ikuti
                </p>
                <div class="table-responsive">
                    <!-- search -->
                    <x-search name="event"></x-search>
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
                            <!-- empty events -->
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
                                    <td><a class="badge badge-success" href="/anggota/public/assets/images/{{$data->paid_image}}" target="_blank">Lihat Bukti</a>
                                    </td>
                                <?php } ?>
                                <td>{{$data->created_at}}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <!-- <a href="/anggota/event_teams/show/{{$data->id_event_teams }}" title="show" class="badge badge-info">Show</a> -->
                                        <a href="/anggota/events/editJoin/{{$data->id_event_teams }}" class="badge badge-warning">Upload bukti</a>
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

@endsection