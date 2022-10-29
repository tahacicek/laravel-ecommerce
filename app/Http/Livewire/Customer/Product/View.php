<?php

namespace App\Http\Livewire\Customer\Product;

use Livewire\Component;

class View extends Component
{
    public $category, $product;
    public function render()
    {
        return view('livewire.customer.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
}
