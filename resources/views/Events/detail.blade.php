@extends('layouts.home')
@section('title', 'events')

@section('content')
<section class="container mt-2">
    <div class="content-header text-left">
        <h2>Event detail</h2>
        <h6 class="section-subtitle text-muted">Banyak event yang dapat kamu explore di ESI-Sumbawa.</h6>
    </div>
    <div class="row mb-5 mt-3">
        <div class="col-sm-3 col-md-4 col-xl-6 col-lg-6" data-aos="fade-left">
            <div class="carouSnap  carouSnap-round">
                <div class="numbSlide"></div>
                <div class="bnSlide"></div>
                <div class="photoCollect">
                    <!-- YOUR IMAGES HERE (Maximum 10 Photos & Minimum 1 Photo) -->
                    <a href="/images/{{$event->event_image}}">
                        <img src="/images/{{$event->event_image}}" alt="#no-image" title="#title-image" loading="lazy" />
                    </a>
                </div>
                <div class="indCat"></div>
            </div>
        </div>
        <div class="col-sm-3 col-md-4 col-xl-6 col-lg-6" data-aos="fade-right">
            <h3 class="m-0" style="display: inline-block;">{{ $event->event_name }}</h3>
            <h6 class="text-muted">Game {{ $event->game->game_name}}, {{ $event->created_at->format('d, M Y') }}, {{ $event->created_at->diffForHumans() }} </h6>

            <a href="/events/daftar">
                <button class="btn btn-sm btn-outline-info p-1">Join event</button>
            </a>
            <div class="col-12 p-0">
                <p class="py-4 m-0 text-muted">Slot event {{ $event->slot }}, prize pool {{ $event->pricepool }}, {{ $event->isfree ? 'Free' : 'Not Free/Paid' }}. <br> Start {{ $event->start}}, End {{ $event->end }}</p>

                <p class="font-weight-medium text-muted">{{ $event->detail }}</p>
                <p class="font-weight-medium text-muted">{{ $event->peraturan }}</p>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-3">
            <p class="font-weight-bold">Daftar peserta event</p>
            <ul>
                @if(count($teams) == 0)
                <li>Belum ada peserta</li>
                @endif
                @foreach($teams as $event_teams)
                <li>
                    <a class="text-info" href="/home/squad/{{$event_teams->id_squad}}">
                        <p>{{ $event_teams->squad_name }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-3">
            <p class="font-weight-bold">Pemenang event</p>
            <ul>
                @if(count($winners) == 0)
                <li>Belum ada pemenang</li>
                @endif
                @foreach($winners as $win)
                <li>
                    <a class="text-info" href="/home/squad/{{$win->squad_id}}">
                        <p>{{ $win->squad_name }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endsection