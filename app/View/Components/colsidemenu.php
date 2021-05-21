<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Colsidemenu extends Component
{
    public String $icon;
    public Array $parent;
    public Array $childs;

    public function __construct($icon, $parent, $childs)
    {
        $this->icon = $icon;
        $this->parent = $parent;
        $this->childs = $childs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.colsidemenu');
    }
}
