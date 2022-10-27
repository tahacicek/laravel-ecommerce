<?php

namespace App\Http\Livewire\Customer\Product;

use Livewire\Component;

class Index extends Component
{
    public $product, $category;
    public function render()
    {
        return view('livewire.customer.product.index', [
           "products" => $this->products,
           "category" => $this->category
        ]);
    }

    public function mount($products, $category)
    {
        $this->products = $products;
        $this->category = $category;
        // $this->emit('productIndex');

    }

}
