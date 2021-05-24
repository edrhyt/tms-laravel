<?php

namespace App\View\Components\tables;

use Illuminate\View\Component;

class Striped extends Component
{
    public $size, $header, $tableData, $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($size = 0, $tableData = array(), $header = NULL, $class = NULL)
    {
        $this->size = $size;
        $this->tableData = $tableData;
        $this->header = $header;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.order-view-tables.striped');
    }
}
