@extends('layouts.home')
@section('title', 'events')

@section('content')
<section class="container">
    <div class="content-header text-left">
        <h2>Squad detail</h2>
        <h6 class="section-subtitle text-muted">Banyak squad yang dapat kamu explore di ESI-Sumbawa.</h6>
    </div>
    <div class="row mb-5">
        <div class="col-sm-3 col-md-4 col-xl-6 col-lg-6" data-aos="fade-left">
            <div class="carouSnap  carouSnap-round">
                <div class="numbSlide"></div>
                <div class="bnSlide"></div>
                <div class="photoCollect">
                    <!-- YOUR IMAGES HERE (Maximum 10 Photos & Minimum 1 Photo) -->
                    <a href="/public/images/{{$squad->squad_image}}">
                        <img src="/public/images/{{$squad->squad_image}}" alt="#no-image" title="#title-image" loading="lazy" />
                    </a>
                </div>
                <div class="indCat"></div>
            </div>
        </div>
        <div class="col-sm-3 col-md-4 col-xl-6 col-lg-6" data-aos="fade-right">
            <h3 class="m-0" style="display: inline-block;">{{$squad->squad_name}}</h3>
            <h6 class="text-muted">Game {{ $squad->game ? $squad->game->game_name : '' }}, Dibuat pada {{$squad->created_at->format('d, M Y')}}</h6>

            <a href="/request_squads">
                <button class="btn btn-sm btn-outline-info p-1">Join squad ini</button>
            </a>
            <div class="col-12 p-0">
                <p class="py-4 m-0 text-muted">
                <ul>
                    <li>Leader: {{ $squad->leader->ingame_name }}</li>
                    <li>Kontak: {{ $squad->user ? $squad->user->nama : '' }}</li>
                    <li>Email: {{ $squad->user ? $squad->user->email : ''}}</li>
                    <li>Management: @if($squad->management) <a class="text-info" href="/home/management/{{$squad->management->id_management}}">{{$squad->management->management_name}}</a> @else Squad tidak bergabung dalam management @endif</li>
                </ul>
                </p>
                <p class="py-4 m-0 text-muted">Member: </p>
                <ul>
                    @foreach ($squad->players as $player)
                    <li>
                        <a class="text-info" href="/home/player/{{$player->id_player}}">
                            {{ $player->ingame_name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection