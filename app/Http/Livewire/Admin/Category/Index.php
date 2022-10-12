<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;
    public function render()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.category.index', [
            'categories' => $categories
        ]);
    }

    public function deleteCategory($category_id)
    {
       $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        $category = Category::find($this->category_id);
        $path = public_path('uploads/category/', $category->image);
        if (File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
        session()->flash('message', 'Category has been deleted successfully.');
        toastr()->success('Category has been deleted successfully.');
        $this->dispatchBrowserEvent("close-modal");
        $this->dispatchBrowserEvent("delete-category");
    }

}
