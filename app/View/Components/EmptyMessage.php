<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EmptyMessage extends Component
{
    public $page;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($page)
    {
        $this->page = $page;
    }

    public function message()
    {
        if ($this->page === 'all-products'){
            return 'No available products yet';
        } elseif ($this->page === 'category-products'){
            return 'No products in this category yet';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
            <div class="col-md-12 text-center animate-box">
                <h3>{{ $message }}</h3>
            </div>
        blade;
    }
}
