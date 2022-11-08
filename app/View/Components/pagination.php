<?php

namespace App\View\Components;

use Illuminate\View\Component;

class pagination extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $current;
    public $url;
    public $last;
    public function __construct($current,$url,$last)
    {
        $this->current = $current;
        $this->url = $url;
        $this->last = $last;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pagination');
    }
}
