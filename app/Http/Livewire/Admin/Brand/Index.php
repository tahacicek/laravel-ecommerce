<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $slug, $status, $brand_id, $category_id;
    public $updateMode = false;

    public function rules(){
        return[
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
            'category_id' => 'required',
        ];
    }

    public function resetInput(){
        $this->name = null;
        $this->slug = null;
        $this->status = null;
        $this->brand_id = null;
        $this->category_id = null;
    }

    public function render()
    {
        $categories = Category::where('status', 0)->get();
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.brand.index',["brands" => $brands, "categories" => $categories])->extends('layouts.admin')->section('content');

    }

    public function storeBrand(){
        $validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? 1 : 0,
            'category_id' => $this->category_id,
        ]);
        session()->flash('message', 'Brand Created Successfully');
        toastr()->success($this->name . " " . 'Başarıyla Oluşturuldu');
        $this->dispatchBrowserEvent("close-modal");
        $this->resetInput();

    }

    public function editBrand(int $brand_id){
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->category_id = $brand->category_id;

    }

    public function updateBrand(){
        $validatedData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? 1 : 0,
            'category_id' => $this->category_id,
        ]);
        session()->flash('message', 'Brand Updated Successfully');
        toastr()->success($this->name . " " . 'Başarıyla Güncellendi');
        $this->dispatchBrowserEvent("close-modal");


        $this->resetInput();
    }

    public function deleteBrand($brand_id){
      $this->brand_id = $brand_id;
    }

    public function destroyBrand(){
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Brand Deleted Successfully');
        toastr()->success($this->name . " " . 'Başarıyla Silindi');
        $this->dispatchBrowserEvent("close-modal");
        $this->resetInput();
    }

    public function closeModal(){
        $this->dispatchBrowserEvent("close-modal");
    }

    public function openModal(){
        $this->dispatchBrowserEvent("open-modal");
    }

}
