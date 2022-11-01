<?php

namespace App\Http\Livewire\Customer\Product;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Yoeunes\Toastr\Facades\Toastr;
use Yoeunes\Toastr\Toastr as ToastrToastr;

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
        if ($this->ProductColorSelectedQuantity == 0) {
            $this->ProductColorSelectedQuantity = 'outOfStock';
        }
        //  $this->product->productColors()->update(['selected' => false]);
        //     $productColor->update(['selected' => true]);

    }

    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if(Wishlist::where('user_id', Auth::id())->where('product_id', $productId)->first()){
                Toastr::error('Ürün zaten favorilerinizde mevcut', 'Hata');
            }else{
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId
                ]);
                $this->emit('removeWishlistItem');
                Toastr::success('Ürün favorilerinize eklendi', 'Başarılı');
            }


        } else {
            Toastr::info('Ürünü favorilere eklemek için giriş yapmalısınız.', 'Dikkat !');
            return false;
        }
    }
}
