@extends('layouts.home')
@section('title', 'events')

@section('content')
<div class="banner">
    <div class="container">
        <h1 class="font-weight-semibold">ESI Sumbawa<br>Nusa Tenggara Barat.</h1>
        <h6 class="font-weight-normal text-muted pb-3">Simple is a simple assets/template with a creative design that solves all your marketing and SEO queries.</h6>
        <img src="{{env('ASSETS')}}/assets/landing-page/images/Group171.svg" alt="" class="img-fluid">
    </div>
</div>
<div class="content-wrapper">
    <div class="container">
        <x-main :events="$events" :players="$players" :squads="$squads" :managements="$managements" />
        <section class="features-overview" id="features-section">
            <div class="content-header">
                <h2>How does it works</h2>
                <h6 class="section-subtitle text-muted">One theme that serves as an easy-to-use operational toolkit<br>that meets customer's needs.</h6>
            </div>
            <div class="d-md-flex justify-content-between">
                <div class="grid-margin d-flex justify-content-start">
                    <div class="features-width">
                        <img src="{{env('ASSETS')}}/assets/landing-page/images/Group12.svg" alt="" class="img-icons">
                        <h5 class="py-3">Speed<br>Optimisation</h5>
                        <p class="text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                        <a href="/anggota#">
                            <p class="readmore-link">Readmore</p>
                        </a>
                    </div>
                </div>
                <div class="grid-margin d-flex justify-content-center">
                    <div class="features-width">
                        <img src="{{env('ASSETS')}}/assets/landing-page/images/Group7.svg" alt="" class="img-icons">
                        <h5 class="py-3">SEO and<br>Backlinks</h5>
                        <p class="text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                        <a href="/anggota#">
                            <p class="readmore-link">Readmore</p>
                        </a>
                    </div>
                </div>
                <div class="grid-margin d-flex justify-content-end">
                    <div class="features-width">
                        <img src="{{env('ASSETS')}}/assets/landing-page/images/Group5.svg" alt="" class="img-icons">
                        <h5 class="py-3">Content<br>Marketing</h5>
                        <p class="text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                        <a href="/anggota#">
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
                    <img src="{{env('ASSETS')}}/assets/landing-page/images/Group1.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
                    <img src="{{env('ASSETS')}}/assets/landing-page/images/Group2.png" alt="" class="img-fluid">
                </div>
                <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
                    <h3 class="m-0">Leading Digital Agency<br>for Business Solution.</h3>
                    <div class="col-lg-9 col-xl-8 p-0">
                        <p class="py-4 m-0 text-muted">Power-packed with impressive features and well-optimized, this assets/template is designed to provide the best performance in all circumstances.</p>
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
                    <a href="/anggota/register">
                        <button class="btn btn-rounded btn-outline-info">Register</button>
                    </a>
                    <a href="/anggota/login">
                        <button class="btn btn-rounded btn-outline-info">Login</button>
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection