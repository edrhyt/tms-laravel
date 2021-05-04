<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Select extends Component
{
    public $width, $slug, $title, $defaultOption, $options, $isEmployee, $disabled;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($width, $slug, $title, $defaultOption, $options, $isEmployee = false, $disabled = false)
    {
        $this->width = $width;
        $this->slug = $slug;
        $this->title = $title;
        $this->defaultOption = $defaultOption;
        $this->options = $options;
        $this->isEmployee = $isEmployee;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.select');
    }
}
