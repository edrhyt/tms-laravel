<?php

namespace App\View\Components\Container;

use Illuminate\View\Component;

class Card extends Component
{
    public $width, $slug, $title, $options; 

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($width, $slug, $title, $options = array())
    {
        $this->width = $width;
        $this->slug = $slug;
        $this->title = $title;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.container.card');
    }
}
