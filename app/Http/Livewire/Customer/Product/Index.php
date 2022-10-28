<?php

namespace App\Http\Livewire\Customer\Product;

use Livewire\Component;

class Index extends Component
{
    public $product, $category, $brandInputs = [];
    protected $listeners = ['addToCart' => 'addToCart'];
    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' =>'brand'],
    ];
    public function render()
    {
        $this->products = \App\Models\Product::where('category_id', $this->category->id)->when($this->brandInputs, function($q){
            $q->whereIn('brand', $this->brandInputs);
        })->where('status', 0)->get();

        return view('livewire.customer.product.index', [
           "products" => $this->products,
           "category" => $this->category
        ]);
    }

    public function mount($category)
    {
        $this->category = $category;
        // $this->emit('productIndex');

    }

}
