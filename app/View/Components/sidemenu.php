<?php

namespace App\View\Components;

use Illuminate\View\Component;

class sidemenu extends Component
{
    public String $icon;
    public String $name;

    public function __construct($icon, $name)
    {
        $this->icon = $icon;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidemenu');
    }
}
