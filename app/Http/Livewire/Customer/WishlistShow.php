<?php

namespace App\Http\Livewire\Customer;

use App\Models\Wishlist;
use Livewire\Component;
use Yoeunes\Toastr\Facades\Toastr;

class WishlistShow extends Component
{
    public function render()
    {
        if (auth()->check()) {
            $wishlists = Wishlist::where("user_id", auth()->user()->id)->get();
        } else {
            $wishlists = collect();
        }
        return view('livewire.customer.wishlist-show', [
            'wishlist' => $wishlists
        ]);
    }
    public function removeWishlistItem(int $wishlistId)
    {
        // $wishlist = Wishlist::find($wishlistId);
        // $wishlist->delete();
        // Toastr::success("Ürün favorilerden silindi", "Başarılı");

        $wishlist = Wishlist::where("user_id", auth()->user()->id)->where("id", $wishlistId)->first();
        $this->emit('removeWishlistItem');
        if ($wishlist) {
            $wishlist->delete();
            Toastr::success("Ürün favorilerden silindi", "Başarılı");
        } else {
            Toastr::error("Ürün favorilerden silinemedi", "Hata");
        }
    }
}
