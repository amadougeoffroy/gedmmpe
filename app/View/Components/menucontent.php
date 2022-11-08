<?php

namespace App\View\Components;

use Illuminate\View\Component;

class menucontent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $classe;
    public function __construct($classe)
    {
        $this->classe=$classe;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menucontent');
    }
}
