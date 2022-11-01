<?php

namespace App\Http\Livewire\Customer;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistCount extends Component
{
    public $wishlistCount;
    protected $listeners = ['removeWishlistItem' => 'checkWishlistCount'];
    public function render()
    {
        $this->wishlistCount = $this->checkWishlistCount();
        return view('livewire.customer.wishlist-count', [
            'wishlistCount' => $this->wishlistCount
        ]);
    }

    public function checkWishlistCount(){
        if(auth()->check()){
          return  $this->wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        //   auth()->user()->wishlist->count();
        }else{
            $this->wishlistCount = 0;
        }

    }
}
