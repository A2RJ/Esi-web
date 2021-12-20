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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/carousnap/carousnap@v1.7/carousnap/carousnap.css" integrity="sha384-AvIUz0OeqILp4fNEi51z9HqDHi/FXyvB54l4CFzgP3pV8V67SxE8j0CEmLHWIu/e" crossorigin="anonymous" />
    <style>
    </style>
</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    <header id="header-section">
        <nav class="navbar navbar-expand-lg pl-3 pl-sm-0 {{!\Request::is('/') ? 'bg-white' : '' }}" id="navbar">
            <div class="container">
                <div class="navbar-brand-wrapper d-flex w-100">
                    <img src="/landing-page/images/1639985799654.jpg" style="width: 80px;" alt="">
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="mdi mdi-menu navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
                        <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                            <div class="navbar-collapse-logo">
                                <a href="/">
                                    <img src="/landing-page/images/1639985799654.jpg" style="width: 80px;" alt="">
                                </a>
                            </div>
                            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        @if(\Request::is('/'))
                        <li class="nav-item">
                            <a class="nav-link" href="#events-section">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#squads-section">Squads</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#managements-section">Managements</a>
                        </li>
                        @endif
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

    @yield('content')

    <section class="container contact-details" style="margin-top: 150px;" id="contact-details-section">
        <div class="row text-center text-md-left">
            <div class="col-12 col-md-6 col-lg-3 grid-margin">
                <img src="/landing-page/images/1639985799654.jpg" style="width: 80px;" alt="" class="pb-2">
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

    <section>
        <footer class="border-top">
            <p class="text-center text-muted pt-4">Copyright © 2019<a href="https://www.bootstrapdash.com/" class="px-1">Bootstrapdash.</a>All rights reserved.</p>
        </footer>
    </section>
    <script src="https://cdn.jsdelivr.net/gh/carousnap/carousnap@v1.7/carousnap/carousnap.js" integrity="sha384-1mHmu4fyyExEnjX4DGx0QsSsPWPIaJ7oFcQ3LIL/gAT7t5i6mNfW80xJOzEHfNgv" crossorigin="anonymous"></script>
    <script src="/landing-page/vendors/jquery/jquery.min.js"></script>
    <script src="/landing-page/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/landing-page/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="/landing-page/vendors/aos/js/aos.js"></script>
    <script src="/landing-page/js/landingpage.js"></script>
</body>

</html>