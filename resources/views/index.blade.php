@extends('layouts.home')
@section('title', 'events')

@section('content')
<div class="banner">
    <div class="container">
        <h1 class="font-weight-semibold">ESI Sumbawa<br>Nusa Tenggara Barat.</h1>
        <h6 class="font-weight-normal text-muted pb-3">Simple is a simple template with a creative design that solves all your marketing and SEO queries.</h6>
        <img src="/public/landing-page/images/Group171.svg" alt="" class="img-fluid">
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

                <!-- search bar events -->
                <x-search name="event"></x-search>

                <!-- empty events -->
                <x-empty-data name="event" :items="$events"></x-empty-data>

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

                <!-- search player -->
                <x-search name="player"></x-search>

                <!-- empty player -->
                <x-empty-data name="player" :items="$players"></x-empty-data>

                <!-- looping players -->
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

                <!-- search squad -->
                <x-search name="squad"></x-search>

                <!-- empty squad -->
                <x-empty-data name="squad" :items="$squads"></x-empty-data>

                <!-- looping squads -->
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

                <!-- search management -->
                <x-search name="management"></x-search>

                <!-- empty management -->
                <x-empty-data name="management" :items="$managements"></x-empty-data>

                <!-- looping management -->
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
        <section class="features-overview" id="features-section">
            <div class="content-header">
                <h2>How does it works</h2>
                <h6 class="section-subtitle text-muted">One theme that serves as an easy-to-use operational toolkit<br>that meets customer's needs.</h6>
            </div>
            <div class="d-md-flex justify-content-between">
                <div class="grid-margin d-flex justify-content-start">
                    <div class="features-width">
                        <img src="/public/landing-page/images/Group12.svg" alt="" class="img-icons">
                        <h5 class="py-3">Speed<br>Optimisation</h5>
                        <p class="text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                        <a href="#">
                            <p class="readmore-link">Readmore</p>
                        </a>
                    </div>
                </div>
                <div class="grid-margin d-flex justify-content-center">
                    <div class="features-width">
                        <img src="/public/landing-page/images/Group7.svg" alt="" class="img-icons">
                        <h5 class="py-3">SEO and<br>Backlinks</h5>
                        <p class="text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                        <a href="#">
                            <p class="readmore-link">Readmore</p>
                        </a>
                    </div>
                </div>
                <div class="grid-margin d-flex justify-content-end">
                    <div class="features-width">
                        <img src="/public/landing-page/images/Group5.svg" alt="" class="img-icons">
                        <h5 class="py-3">Content<br>Marketing</h5>
                        <p class="text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                        <a href="#">
                            <p class="readmore-link">Readmore</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="digital-marketing-service" id="digital-marketing-section">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
                    <h3 class="m-0">We Offer a Full Range<br>of Digital Marketing Services!</h3>
                    <div class="col-lg-7 col-xl-6 p-0">
                        <p class="py-4 m-0 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                        <p class="font-weight-medium text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer</p>
                    </div>
                </div>
                <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
                    <img src="/public/landing-page/images/Group1.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
                    <img src="/public/landing-page/images/Group2.png" alt="" class="img-fluid">
                </div>
                <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
                    <h3 class="m-0">Leading Digital Agency<br>for Business Solution.</h3>
                    <div class="col-lg-9 col-xl-8 p-0">
                        <p class="py-4 m-0 text-muted">Power-packed with impressive features and well-optimized, this template is designed to provide the best performance in all circumstances.</p>
                        <p class="pb-2 font-weight-medium text-muted">Its smart features make it a powerful stand-alone website building tool.</p>
                    </div>
                    <button class="btn btn-info">Readmore</button>
                </div>
            </div>
        </section>
        <section class="contact-us" id="contact-section">
            <div class="contact-us-bgimage grid-margin">
                <div class="pb-4">
                    <h4 class="px-3 px-md-0 m-0" data-aos="fade-down">Belum bergabung?</h4>
                    <!-- <h4 class="pt-1" data-aos="fade-down">Contact us</h4> -->
                </div>
                <div data-aos="fade-up">
                    <a href="/register">
                        <button class="btn btn-rounded btn-outline-info">Register</button>
                    </a>
                    <a href="/login">
                        <button class="btn btn-rounded btn-outline-info">Login</button>
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection