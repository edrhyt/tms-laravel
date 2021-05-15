<?php

namespace App\View\Components\Container;

use Illuminate\View\Component;

class CartModal extends Component
{
    public $width, $slug, $title, $dataTable, $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($width, $slug, $title, $dataTable, $value = NULL)
    {
        $this->width = $width;
        $this->slug = $slug;
        $this->title = $title;
        $this->dataTable = $dataTable;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.container.cart-modal');
    }
}
