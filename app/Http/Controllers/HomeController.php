<?php

namespace App\Http\Controllers;

use App\Models\Event_teams;
use App\Models\Event_winner;
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
     * detail the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function event($id)
    {
        $event = Events::with('owner', 'game')
            ->find($id);
        $teams = Event_teams::join('squads', 'event_teams.squad_id', 'squads.id_squad')
            ->where('event_teams.event_id', $id)
            ->get();
        $winners = Event_winner::join('squads', 'event_winners.squad_id', 'squads.id_squad')
            ->where('event_winners.event_id', $id)
            ->get();

        return view('Events.detail', compact('event', 'teams', 'winners'));
    }

    public function player($id)
    {
        $player = Players::with('game', 'user', 'squad', 'management')->find($id);
        return view('Players.detail', compact('player'));
    }

    public function squad($id)
    {
        $squad = Squads::with('game', 'user', 'leader', 'players', 'management')->find($id);
        return view('Squads.detail', compact('squad'));
    }

    public function management($id)
    {
        $management = Managements::with('squads')->find($id);
        return view('Managements.detail', compact('management'));
    }
}
