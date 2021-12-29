@extends('layouts.dashboard')
@section('title', 'ESI - Dashboard')

@section('content')
<div class="bg-white shadow card">
    <div class="banner container row">
        <div class="col-sm-6 pt-5">
            <h1 class="font-weight-semibold mt-5">ESI Sumbawa</h1>
            <h4>Nusa Tenggara Barat.</h4>
            <h6 class="font-weight-normal text-muted pb-3">Simple is a simple assets/template with a creative design that solves all your marketing and SEO queries.</h6>
        </div>
        <div class="col-sm-6 mt-5">
            <img src="{{env('ASSETS')}}/assets/landing-page/images/Group171.svg" alt="" class="img-fluid">

        </div>
    </div>
    <div class="content-wrapper bg-white">
        <div class="container">
        <x-main :events="$events" :players="$players" :squads="$squads" :managements="$managements" />
        </div>
    </div>
</div>
@endsection