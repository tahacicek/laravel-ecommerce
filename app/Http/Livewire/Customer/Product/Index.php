<?php

namespace App\Http\Livewire\Customer\Product;

use Livewire\Component;

class Index extends Component
{
    public $product, $category, $brandInputs = [], $priceInput;
    protected $listeners = ['addToCart' => 'addToCart'];
    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];
    public function render()
    {
        $this->products = \App\Models\Product::where('category_id', $this->category->id)->when($this->brandInputs, function ($q) {
            $q->whereIn('brand', $this->brandInputs);
        })
            ->when($this->priceInput, function ($q) {
                $q->when($this->priceInput == 'en-yuksek-fiyat', function ($q2) {
                    $q2->orderBy('selling_price', 'desc');
                })->when($this->priceInput == 'en-dusuk-fiyat', function ($q2) {
                    $q2->orderBy('selling_price', 'asc');
                });
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
