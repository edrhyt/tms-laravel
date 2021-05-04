<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Date extends Component
{
    public $width, $slug, $title, $color, $disabled;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($width, $slug, $title, $color = '', $disabled = false)
    {
        $this->width = $width;
        $this->slug = $slug;
        $this->title = $title;
        $this->color = $color;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.date');
    }
}
