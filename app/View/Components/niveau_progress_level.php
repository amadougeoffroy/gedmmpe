<?php

namespace App\View\Components;

use Illuminate\View\Component;

class niveau_progress_level extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $color;
    public $lib;    
    public $obj;
    public $iduser;
    public function __construct($color,$lib,$obj,$iduser)
    {
        $this->color = $color;
        $this->lib = $lib;        
        $this->obj = $obj;
        $this->iduser = $iduser;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.niveau_progress_level');
    }
}
