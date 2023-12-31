<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LayoutAdmin extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $path;
    public $title;
    public function __construct($title,$path)
    {
        //
        $this->title = $title;
        $this->path = $path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout-admin');
    }
}
