<?php

namespace App\View\Components;

use Illuminate\View\Component;

class main extends Component
{
    public $events, $players, $squads, $managements;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($events, $players, $squads, $managements)
    {
        $this->events = $events;
        $this->players = $players;
        $this->squads = $squads;
        $this->managements = $managements;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main');
    }
}
