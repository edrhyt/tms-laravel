<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $width, $slug, $title, $height, $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($width, $slug, $title, $height = 4, $value = NULL)
    {
        $this->width = $width;
        $this->slug = $slug;
        $this->title = $title;
        $this->height = $height;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.textarea');
    }
}
