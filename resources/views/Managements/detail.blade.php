@extends('layouts.home')
@section('title', 'events')

@section('content')
<section class="container">
    <div class="content-header text-left">
        <h2>Management detail</h2>
        <h6 class="section-subtitle text-muted">Banyak management yang dapat kamu explore di ESI-Sumbawa.</h6>
    </div>
    <div class="row mb-5">
        <div class="col-sm-3 col-md-4 col-xl-6 col-lg-6" data-aos="fade-left">
        <div class="carouSnap  carouSnap-round">
                <div class="numbSlide"></div>
                <div class="bnSlide"></div>
                <div class="photoCollect">
                    <!-- YOUR IMAGES HERE (Maximum 10 Photos & Minimum 1 Photo) -->
                    <a href="/images/{{$management->management_image}}">
                        <img src="/images/{{$management->management_image}}" alt="#no-image" title="#title-image" loading="lazy" />
                    </a>
                </div>
                <div class="indCat"></div>
            </div>
        </div>
        <div class="col-sm-3 col-md-4 col-xl-6 col-lg-6" data-aos="fade-right">
            <h3 class="m-0" style="display: inline-block;">{{$management->management_name}}</h3>
            <h6 class="text-muted">Dibuat pada {{$management->created_at->format('d, M Y')}}</h6>

            <div class="col-12 p-0">
                <p class="text-muted">
                    Detail
                </p>

                <ul>
                    <li>Nama management: {{ $management->management_name }}</li>
                    <li>Kontak: {{ $management->kontak }}</li>
                    <li>Web: <a class="text-info" href="{{$management->web_url}}">Link web</a></li>
                    <li>Alamat: {{ $management->alamat }}</li>
                </ul>
                <p class="text-muted">
                    Daftar squad dalam management:
                </p>
                <ul>
                    @if(count($management->squads) == 0)
                    <li>Belum ada squad</li>
                    @endif
                    @foreach($management->squads as $squad)
                    <li> <a class="text-info" href="/home/squad/{{$squad->id_squad}}">{{ $squad->squad_name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection