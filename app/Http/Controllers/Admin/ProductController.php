<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        $brands = \App\Models\Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
        $product = new \App\Models\Product();
        $category = Category::find($validatedData['category_id']);
        $product = $category->products()->create([
            "category_id" => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
            'description' => $validatedData['description'],
            'small_description' => $validatedData['small_description'],
            "original_price" => $validatedData['original_price'],
            "selling_price" => $validatedData['selling_price'],
            "quantity" => $validatedData['quantity'],
            "trending" => $request->trending == true ? 1 : 0,
            "brand" => $validatedData['brand'],
            'status' =>  $request->trending == true ? 1 : 0,
            'meta_title' => $validatedData['meta_title'],
            'meta_description' => $validatedData['meta_description'],
            'meta_keyword' => $validatedData['meta_keyword'],
        ]);
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalName();
                $filename = time() . $i++ . '.' . $extention;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . "-" . $filename;
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        return redirect()->route('admin.products.index');
        toastr()->success('Product created successfully');
    }

    public function edit($id)
    {
        $product = \App\Models\Product::find($id);
        $categories = \App\Models\Category::all();
        $brands = \App\Models\Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image' => 'required',
        ]);

        $product = \App\Models\Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->image = $request->image;
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product = \App\Models\Product::find($id);
        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
    }
}
