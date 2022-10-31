<?php

namespace App\Http\Livewire\Customer;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistShow extends Component
{
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.customer.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }
}
