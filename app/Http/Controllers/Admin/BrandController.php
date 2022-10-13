<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->image = $request->image;
        $brand->save();

        return redirect()->route('admin.brand.index')->with('success', 'Brand created successfully.');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->image = $request->image;
        $brand->save();

        return redirect()->route('admin.brand.index')->with('success', 'Brand updated successfully.');
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect()->route('admin.brand.index')->with('success', 'Brand deleted successfully.');
    }

}
