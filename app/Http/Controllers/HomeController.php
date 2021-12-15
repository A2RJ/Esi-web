<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Managements;
use App\Models\Players;
use App\Models\Squads;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function home()
    {
        $events = Events::with('owner', 'game')->paginate(10);
        $players = Players::with('squad', 'game')->paginate(10);
        $squads = Squads::with('leader', 'game')->paginate(10);
        $managements = Managements::paginate(10);

        return view('home', compact('events', 'players', 'squads', 'managements'));
    }

    public function events($id)
    {
        $event = Events::with('owner', 'game', 'event_winners', 'event_teams')
            ->find($id);

        return view('events.detail', compact('event'));
    }

    public function player($id)
    {
        $player = Players::with('game', 'user', 'squad', 'management')->find($id);
        return view('players.detail', compact('player'));
    }

    public function squad($id)
    {
        $squad = Squads::with('game', 'leader', 'players', 'management')->find($id);
        return view('squads.detail', compact('squad'));
    }

    public function management($id)
    {
        return $management = Managements::with('squads')->find($id);
        return view('managements.detail', compact('management'));
    }
}
