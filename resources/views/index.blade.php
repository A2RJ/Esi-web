<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ env('APP_NAME')}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/landing-page/vendors/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/landing-page/vendors/owl-carousel/css/owl.theme.default.css">
    <link rel="stylesheet" href="/landing-page/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/landing-page/vendors/aos/css/aos.css">
    <link rel="stylesheet" href="/landing-page/css/style.min.css">

    <style>
    </style>
</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    <header id="header-section">
        <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
            <div class="container">
                <div class="navbar-brand-wrapper d-flex w-100">
                    <img src="/landing-page/images/Group2.svg" alt="">
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="mdi mdi-menu navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
                        <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                            <div class="navbar-collapse-logo">
                                <img src="/landing-page/images/Group2.svg" alt="">
                            </div>
                            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#header-section">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#events-section">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#squads-section">Squads</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#managements-section">Managements</a>
                        </li>
                        <li class="nav-item btn-contact-us pl-4 pl-lg-0">
                            @if (Route::has('login'))
                            @auth
                            <a href="/home">
                                <button class="btn btn-outline-info p-2">Dashboard</button>
                            </a>
                            @else
                            <a href="/register">
                                <button class="btn btn-outline-info p-2">Register</button>
                            </a>
                            <a href="/login">
                                <button class="btn btn-outline-info p-2">Login</button>
                            </a>

                            @endauth
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="banner">
        <div class="container">
            <h1 class="font-weight-semibold">ESI Sumbawa<br>Nusa Tenggara Barat.</h1>
            <h6 class="font-weight-normal text-muted pb-3">Simple is a simple template with a creative design that solves all your marketing and SEO queries.</h6>
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
                                    <?php
                                    if (!$event->event_image) {
                                        $image = 'Group115.svg';
                                    } else {
                                        $image = $event->event_image;
                                    }
                                    ?>
                                    <div class="bg-success text-center card-contents rounded" style="background-image: url('/images/{{$image}}'); background-size: cover;">
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
                        {{ $events->appends(['squads' => $squads->currentPage(), 'managements' => $managements->currentPage()])->links() }}
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
                                    <div class="bg-success text-center card-contents rounded" style="background-image: url('/landing-page/images/Group115.svg'); background-size: cover;">
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
                        {{ $squads->appends(['events' => $events->currentPage(), 'managements' => $managements->currentPage()])->links() }}
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
                                    <div class="bg-success text-center card-contents rounded" style="background-image: url('/landing-page/images/Group115.svg'); background-size: cover;">
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
                        {{ $managements->appends(['events' => $events->currentPage(), 'squads' => $squads->currentPage()])->links() }}
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
                            <img src="/landing-page/images/Group12.svg" alt="" class="img-icons">
                            <h5 class="py-3">Speed<br>Optimisation</h5>
                            <p class="text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                            <a href="#">
                                <p class="readmore-link">Readmore</p>
                            </a>
                        </div>
                    </div>
                    <div class="grid-margin d-flex justify-content-center">
                        <div class="features-width">
                            <img src="/landing-page/images/Group7.svg" alt="" class="img-icons">
                            <h5 class="py-3">SEO and<br>Backlinks</h5>
                            <p class="text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                            <a href="#">
                                <p class="readmore-link">Readmore</p>
                            </a>
                        </div>
                    </div>
                    <div class="grid-margin d-flex justify-content-end">
                        <div class="features-width">
                            <img src="/landing-page/images/Group5.svg" alt="" class="img-icons">
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
                        <img src="/landing-page/images/Group1.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
                        <img src="/landing-page/images/Group2.png" alt="" class="img-fluid">
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
            <section class="contact-details" id="contact-details-section">
                <div class="row text-center text-md-left">
                    <div class="col-12 col-md-6 col-lg-3 grid-margin">
                        <img src="/landing-page/images/Group2.svg" alt="" class="pb-2">
                        <div class="pt-2">
                            <p class="text-muted m-0">mikayla_beer@feil.name</p>
                            <p class="text-muted m-0">906-179-8309</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 grid-margin">
                        <h5 class="pb-2">Get in Touch</h5>
                        <p class="text-muted">Don’t miss any updates of our new templates and extensions.!</p>
                        <form>
                            <input type="text" class="form-control" id="Email" placeholder="Email id">
                        </form>
                        <div class="pt-3">
                            <button class="btn btn-dark">Subscribe</button>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 grid-margin">
                        <h5 class="pb-2">Our Guidelines</h5>
                        <a href="#">
                            <p class="m-0 pb-2">Terms</p>
                        </a>
                        <a href="#">
                            <p class="m-0 pt-1 pb-2">Privacy policy</p>
                        </a>
                        <a href="#">
                            <p class="m-0 pt-1 pb-2">Cookie Policy</p>
                        </a>
                        <a href="#">
                            <p class="m-0 pt-1">Discover</p>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 grid-margin">
                        <h5 class="pb-2">Our address</h5>
                        <p class="text-muted">518 Schmeler Neck<br>Bartlett. Illinois</p>
                        <div class="d-flex justify-content-center justify-content-md-start">
                            <a href="#"><span class="mdi mdi-facebook"></span></a>
                            <a href="#"><span class="mdi mdi-twitter"></span></a>
                            <a href="#"><span class="mdi mdi-instagram"></span></a>
                            <a href="#"><span class="mdi mdi-linkedin"></span></a>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="border-top">
                <p class="text-center text-muted pt-4">Copyright © 2019<a href="https://www.bootstrapdash.com/" class="px-1">Bootstrapdash.</a>All rights reserved.</p>
            </footer>

        </div>
    </div>
    <script src="/landing-page/vendors/jquery/jquery.min.js"></script>
    <script src="/landing-page/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/landing-page/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="/landing-page/vendors/aos/js/aos.js"></script>
    <script src="/landing-page/js/landingpage.js"></script>
</body>

</html>