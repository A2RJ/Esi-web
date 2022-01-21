<?php

use Illuminate\Support\Facades\Auth; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ESI @yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{env('ASSETS')}}/assets/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{env('ASSETS')}}/assets/template/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{env('ASSETS')}}/assets/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{env('ASSETS')}}/assets/template/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="{{env('ASSETS')}}/assets/template/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="{{env('ASSETS')}}/assets/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- <link rel="stylesheet" href="{{env('ASSETS')}}/assets/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
  <!-- <link rel="stylesheet" href="{{env('ASSETS')}}/assets/template/js/select.dataTables.min.css"> -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{env('ASSETS')}}/assets/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{env('ASSETS')}}/assets/template/images/favicon.png" />
  <style>
    .menu a {
      margin-right: 10px;
      margin-bottom: 10px;
      text-decoration: none;
    }

    a {
      text-decoration: none;
      color: black;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="/anggota">
            <img src="{{env('ASSETS')}}/assets/landing-page/images/esi.png" style="height: 80px;" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="/anggota">
            <img src="{{env('ASSETS')}}/assets/landing-page/images/esi.png" style="height: 50px;" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Hello <span class="text-black fw-bold">{{ auth()->user()->nama }}</span></h1>
            <h3 class="welcome-sub-text">Welcome back </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="{{env('ASSETS')}}/assets/images/{{auth()->user()->user_image}}" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img style="width:100px;height:100px;" class="img-md rounded-circle" src="{{env('ASSETS')}}/assets/images/{{auth()->user()->user_image}}" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">{{ auth()->user()->nama }}</p>
                <p class="fw-light text-muted mb-0">{{ auth()->user()->email }}</p>
              </div>
              <a class="dropdown-item" href="/anggota/users/profile/{{auth()->user()->id_user}}"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile</a>
              <a class="dropdown-item" href="/anggota/logout">
                <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/anggota/home">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php if (Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'management' ||  Auth::user()->user_role == 'player') : ?>
            <li class="nav-item nav-category">Events</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#Events" aria-expanded="false" aria-controls="Events">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Events</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="Events">
                <ul class="nav flex-column sub-menu">
                  <?php if (Auth::user()->user_role == 'admin') : ?>
                    <li class="nav-item"> <a class="nav-link" href="/anggota/events">All Events</a></li>
                  <?php endif; ?>
                  <li class="nav-item"> <a class="nav-link" href="/anggota/events/followEvent">Events</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/anggota/events/events">My Events</a></li>
                </ul>
              </div>
            </li>
          <?php endif; ?>
          <?php if (Auth::user()->user_role == 'admin') : ?>
            <li class="nav-item nav-category">Games</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#Games" aria-expanded="false" aria-controls="Games">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Games</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="Games">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/anggota/games">Games</a></li>
                </ul>
              </div>
            </li>
          <?php endif; ?>
          <?php if (Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'management') : ?>
            <li class="nav-item nav-category">Managements</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#Managements" aria-expanded="false" aria-controls="Managements">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Managements</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="Managements">
                <ul class="nav flex-column sub-menu">
                  <?php if (Auth::user()->user_role == 'admin') : ?>
                    <li class="nav-item"> <a class="nav-link" href="/anggota/managements">All Managements</a></li>
                  <?php endif; ?>
                  <li class="nav-item"> <a class="nav-link" href="/anggota/managements/managements">My Managements</a></li>
                </ul>
              </div>
            </li>
          <?php endif; ?>
          <?php if (Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'management' ||  Auth::user()->user_role == 'player') : ?>
            <li class="nav-item nav-category">Squads</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#Squads" aria-expanded="false" aria-controls="Squads">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Squads</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="Squads">
                <ul class="nav flex-column sub-menu">
                  <?php if (Auth::user()->user_role == 'admin') : ?>
                    <li class="nav-item"> <a class="nav-link" href="/anggota/squads">All Squads</a></li>
                  <?php endif; ?>
                  <li class="nav-item"> <a class="nav-link" href="/anggota/squads/squads">My Squads</a></li>
                </ul>
              </div>
            </li>
          <?php endif; ?>
          <?php if (Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'management' ||  Auth::user()->user_role == 'player') : ?>
            <li class="nav-item nav-category">Game Account</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#GameAccount" aria-expanded="false" aria-controls="GameAccount">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Game Account</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="GameAccount">
                <ul class="nav flex-column sub-menu">
                  <?php if (Auth::user()->user_role == 'admin') : ?>
                    <li class="nav-item"> <a class="nav-link" href="/anggota/players">All Game Account</a></li>
                  <?php endif; ?>
                  <li class="nav-item"> <a class="nav-link" href="/anggota/players/players">My Game Account</a></li>
                </ul>
              </div>
            </li>
          <?php endif; ?>
          <?php if (Auth::user()->user_role == 'admin') : ?>
            <li class="nav-item nav-category">Users</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#Users" aria-expanded="false" aria-controls="Users">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="Users">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/anggota/users">Users</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/anggota/admin">Admin</a></li>
                </ul>
              </div>
            </li>
          <?php endif; ?>
          <!-- li logout -->
          <li class="nav-item nav-category">Profile</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Profile" aria-expanded="false" aria-controls="Profile">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Profile</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Profile">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/anggota/users/profile/{{auth()->user()->id_user}}">Profile</a></li>
                <li class="nav-item"> <a class="nav-link" href="/anggota/logout">Logout</a></li>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="/anggota/logout">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title"></span>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin assets/template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{env('ASSETS')}}/assets/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{env('ASSETS')}}/assets/template/vendors/chart.js/Chart.min.js"></script>
  <script src="{{env('ASSETS')}}/assets/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="{{env('ASSETS')}}/assets/template/vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{env('ASSETS')}}/assets/template/js/off-canvas.js"></script>
  <script src="{{env('ASSETS')}}/assets/template/js/hoverable-collapse.js"></script>
  <script src="{{env('ASSETS')}}/assets/template/js/template.js"></script>
  <script src="{{env('ASSETS')}}/assets/template/js/settings.js"></script>
  <script src="{{env('ASSETS')}}/assets/template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{env('ASSETS')}}/assets/template/js/dashboard.js"></script>
  <script src="{{env('ASSETS')}}/assets/template/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>