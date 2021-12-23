<?php

namespace App\View\Components;

use Illuminate\View\Component;

class emptyData extends Component
{
    public $name;
    public $items;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $items)
    {
        $this->name = $name;
        $this->items = $items;
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.empty-data');
    }
}
