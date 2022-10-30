<?php

namespace App\Http\Livewire\Customer\Product;

use Livewire\Component;

class View extends Component
{
    public $category, $product, $ProductColorSelectedQuantity, $productColor;
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

    public function colorSelected($productColorId)
    {
        // dd($productColorId);
       $productColor = $this->product->productColors()->where('id', $productColorId)->first();
       $this->ProductColorSelectedQuantity = $productColor->quantity;
       if($this->ProductColorSelectedQuantity == 0){
           $this->ProductColorSelectedQuantity = 'outOfStock';
         }
        //  $this->product->productColors()->update(['selected' => false]);
        //     $productColor->update(['selected' => true]);

    }
}
