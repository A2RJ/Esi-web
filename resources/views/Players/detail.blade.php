@extends('layouts.home')
@section('title', 'events')

@section('content')
<section class="container">
    <div class="content-header text-left">
        <h2>Player detail</h2>
        <h6 class="section-subtitle text-muted">Banyak player yang dapat kamu explore di ESI-Sumbawa.</h6>
    </div>
    <div class="row mb-5">
        <div class="col-sm-3 col-md-4 col-xl-6 col-lg-6" data-aos="fade-left">
            <div class="carouSnap  carouSnap-round">
                <div class="numbSlide"></div>
                <div class="bnSlide"></div>
                <div class="photoCollect">
                    <!-- YOUR IMAGES HERE (Maximum 10 Photos & Minimum 1 Photo) -->
                    <a href="/images/{{$player->player_image}}">
                        <img src="/images/{{$player->player_image}}" alt="#no-image" title="#title-image" loading="lazy" />
                    </a>
                </div>
                <div class="indCat"></div>
            </div>
        </div>
        <div class="col-sm-3 col-md-4 col-xl-6 col-lg-6" data-aos="fade-right">
            <h3 class="m-0" style="display: inline-block;">{{$player->user->nama}}</h3>
            <h6 class="text-muted">Game {{ $player->game->game_name }}, Dibuat pada {{$player->created_at->format('d, M Y')}}</h6>

            <div class="col-12 p-0">
                <p class="font-weight-medium text-muted">

                <ul>
                    <li>In game ID: {{$player->ingame_id}}</li>
                    <li>In game name: {{$player->ingame_name}}</li>
                    <li>Game: {{ $player->game->game_name }}</li>
                    <li>Kontak: {{ $player->user->kontak }}</li>
                    <li>Email: {{ $player->user->email }}</li>
                    <li>Squad: @if($player->squad) <a class="text-info" href="/home/squad/{{$player->squad->id_squad}}">{{$player->squad->squad_name}}</a> @else Player tidak bergabung dalam squad @endif</li>
                    @if($player->management)
                    <li>management: <a class="text-info" href="/home/management/{{$player->management->id_management}}">{{ $player->management->management_name }}</a></li>
                    @else
                    <li>Management: Belum bergabung dalam management</li>
                    @endif
                </ul>
                </p>

            </div>
        </div>
    </div>
</section>
@endsection