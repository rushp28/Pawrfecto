<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $name;
    public $imageUrl;
    public $price;
    public function __construct($name, $imageUrl, $price)
    {
        $this->name = $name;
        $this->imageUrl = $imageUrl;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
