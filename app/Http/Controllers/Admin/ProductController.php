<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
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
            'status' =>  $request->status == true ? 1 : 0,
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
        return redirect()->route('admin.product.index')->with('success', 'Ürün Başarıyla Oluşturuldu.');
    }

    public function edit(int $product_id)
    {
        $product = \App\Models\Product::find($product_id);
        $categories = \App\Models\Category::all();
        $brands = \App\Models\Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(ProductFormRequest $request, int $product_id)
    {
        $validatedData = $request->validated();
        $product = Category::find($validatedData["category_id"])->products()->where('id', $product_id)->first();
        $product->update([
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
        return redirect()->route('admin.product.index')->with('success', 'Ürün Başarıyla Güncellendi.');
    }

    public function delete(int $product_id)
    {
        $product = \App\Models\Product::find($product_id);
        if ($product->productImages) {
            foreach ($product->productImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Ürün Başarıyla Silindi.');
    }

    public function imageDelete(string $product_image_id)
    {
        $productImage = ProductImage::find($product_image_id);

        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }

        $productImage->delete();
        return redirect()->back()->with('success', 'Ürün Resimleri Başarıyla Silindi.');
    }

}
