<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('admin.products.index');
    }

    public function create() {
        $categories = \App\Models\Category::all();
        $brands = \App\Models\Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }
}
