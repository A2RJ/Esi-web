@extends('layouts.dashboard')
@section('title', 'ESI - Dashboard')

@section('content')
<div class="banner container row">
    <div class="col-sm-6 pt-5">
        <h1 class="font-weight-semibold mt-5">ESI Sumbawa</h1>
        <h4>Nusa Tenggara Barat.</h4>
        <h6 class="font-weight-normal text-muted pb-3">Simple is a simple template with a creative design that solves all your marketing and SEO queries.</h6>
    </div>
    <div class="col-sm-6">
        <img src="/landing-page/images/Group171.svg" alt="" class="img-fluid">

    </div>
</div>
<div class="content-wrapper">
    <div class="container">
        <section class="customer-feedback">
            <div class="row mt-5" id="events-section">
                <div class="col-12 text-center pb-5">
                    <h2>Daftar event</h2>
                    <h6 class="section-subtitle text-muted m-0">Berikut adalah event yang bisa kamu ikuti.</h6>
                </div>
                <!-- looping events -->
                @foreach($events as $event)
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
                    <a href="/home/event/{{$event->id_event}}">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="bg-success text-center card-contents rounded" style="background-image: url('/images/{{$event->event_image}}'); background-size: cover;">
                                    <div style="height: 200px;"></div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">{{ $event->event_name }}</h6>
                                    <p>Join {{ $event->created_at->format('d, M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="col-12 d-flex justify-content-center">
                    {{ $events->appends(['players' => $players->currentPage(),'squads' => $squads->currentPage(), 'managements' => $managements->currentPage()])->links() }}
                </div>
            </div>
            <div class="row mt-5" id="players-section">
                <div class="col-12 text-center pb-5">
                    <h2>Ayo cek player berbakat Sumbawa</h2>
                    <h6 class="section-subtitle text-muted m-0">Cek data mu dibawah iya.</h6>
                </div>
                <!-- looping users -->
                @foreach($players as $player)
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
                    <a href="/home/player/{{$player->id_player}}">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="bg-success text-center card-contents rounded" style="background-image: url('/images/{{$player->player_image}}'); background-size: cover;">
                                    <div style="height: 200px;"></div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">{{$player->ingame_name}}</h6>
                                    <p>Join {{ $player->created_at->format('d, M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="col-12 d-flex justify-content-center">
                    {{ $players->appends(['squads' => $squads->currentPage(),'events' => $events->currentPage(), 'managements' => $managements->currentPage()])->links() }}
                </div>
            </div>
            <div class="row mt-5" id="squads-section">
                <div class="col-12 text-center pb-5">
                    <h2>Ayo cek squadmu</h2>
                    <h6 class="section-subtitle text-muted m-0">Cek data mu dibawah iya.</h6>
                </div>
                <!-- looping users -->
                @foreach($squads as $squad)
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
                    <a href="/home/squad/{{$squad->id_squad}}">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="bg-success text-center card-contents rounded" style="background-image: url('/images/{{$squad->squad_image}}'); background-size: cover;">
                                    <div style="height: 200px;"></div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">{{$squad->squad_name}}</h6>
                                    <p>Join {{ $squad->created_at->format('d, M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="col-12 d-flex justify-content-center">
                    {{ $squads->appends(['players' => $players->currentPage(),'events' => $events->currentPage(), 'managements' => $managements->currentPage()])->links() }}
                </div>
            </div>
            <div class="row mt-5" id="managements-section">
                <div class="col-12 text-center pb-5">
                    <h2>Butuh management?</h2>
                    <h6 class="section-subtitle text-muted m-0">Cek dibawah iya.</h6>
                </div>
                @foreach($managements as $management)
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
                    <a href="/home/management/{{$management->id_management}}">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="bg-success text-center card-contents rounded" style="background-image: url('/images/{{$management->management_image}}'); background-size: cover;">
                                    <div style="height: 200px;"></div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">{{$management->management_name}}</h6>
                                    <p>Join {{ $management->created_at->format('d, M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="col-12 d-flex justify-content-center">
                    {{ $managements->appends(['players' => $players->currentPage(),'events' => $events->currentPage(), 'squads' => $squads->currentPage()])->links() }}
                </div>
            </div>
        </section>
    </div>
</div>
@endsection