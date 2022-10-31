<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = \App\Models\Wishlist::where('user_id', auth()->user()->id)->get();
        $products = \App\Models\Product::where('status', 0)->get();
        return view('customer.wishlist.index', compact('wishlist', 'products'));
    }
}
