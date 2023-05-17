<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DocumentCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title, $status;
    public function __construct($title, $status)
    {
     $this->title = $title;   
     $this->status = $status;   
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.document-card');
    }
}
