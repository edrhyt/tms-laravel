<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Text extends Component
{
    public $width, $slug, $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($width, $slug, $title)
    {
        $this->width = $width;
        $this->slug = $slug;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.text');
    }
}
