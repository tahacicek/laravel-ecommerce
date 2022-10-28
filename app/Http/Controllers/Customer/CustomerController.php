<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {   $sliders = \App\Models\Slider::where('status', 0)->get();
        return view('customer.index', compact('sliders'));
    }

    public function categories()
    {
        $categories = \App\Models\Category::where('status', 0)->get();
        return view('customer.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = \App\Models\Category::where('slug', $category_slug)->first();
        if ($category) {
            return view('customer.collections.product.index', compact('category'));
        }else{
            return redirect()->route("categories")->with('error', 'Kategori Bulunamadı');
        }

    }
}
