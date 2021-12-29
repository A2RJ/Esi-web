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
            <a href="/anggota/home/event/{{$event->id_event}}">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="bg-success text-center card-contents rounded" style="background-image: url('{{env('ASSETS')}}/assets/images/{{$event->event_image}}'); background-size: cover;">
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
            <a href="/anggota/home/player/{{$player->id_player}}">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="bg-success text-center card-contents rounded" style="background-image: url('{{env('ASSETS')}}/assets/images/{{$player->player_image}}'); background-size: cover;">
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
            <a href="/anggota/home/squad/{{$squad->id_squad}}">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="bg-success text-center card-contents rounded" style="background-image: url('{{env('ASSETS')}}/assets/images/{{$squad->squad_image}}'); background-size: cover;">
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
            <a href="/anggota/home/management/{{$management->id_management}}">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="bg-success text-center card-contents rounded" style="background-image: url('{{env('ASSETS')}}/assets/images/{{$management->management_image}}'); background-size: cover;">
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