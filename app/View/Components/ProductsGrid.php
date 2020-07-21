<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductsGrid extends Component
{
    public $products;
    public $category;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($products, $category = true)
    {
        $this->products = $products;
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.products-grid');
    }
}
