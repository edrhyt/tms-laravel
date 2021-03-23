<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Colsidenav extends Component
{
    public $parent_menu;

    public function __construct($parent_menu)
    {
        $this->parent_menu = $parent_menu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.colsidenav');
    }
}