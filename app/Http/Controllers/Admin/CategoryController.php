<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'ASC')->paginate(5); //latest
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();
        $category = new Category;
        $path = "uploads/category/";
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_description = $validatedData['meta_description'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category', $filename);
            $category->image = $path.$filename;

        }

        $category->status = $request->status == true ? 1 : 0;
        $category->save();
        toastr()->success('Category has been created successfully.');
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $id)
    {
        $validatedData = $request->validated();
        $category = Category::find($id);
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_description = $validatedData['meta_description'];
        $category->meta_keyword = $validatedData['meta_keyword'];

        $path = public_path('uploads/category/' . $category->image);
        if ($request->hasFile('image')) {
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category', $filename);
            $category->image = $filename;

        }

        $category->status = $request->status == true ? 1 : 0;
        $category->update();
        toastr()->success('Category has been updated successfully.');
        return redirect()->route('admin.category.index');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        toastr()->success('Category has been deleted successfully.');
        return redirect()->route('admin.category.index');
    }

    public function changeStatus($id)
    {
        $category = Category::find($id);
        $category->status = $category->status == 1 ? 0 : 1;
        $category->save();
        toastr()->success('Status has been changed successfully.');
        return redirect()->route('admin.category.index');
    }
}
