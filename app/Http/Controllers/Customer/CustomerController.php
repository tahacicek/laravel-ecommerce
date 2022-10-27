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
}
