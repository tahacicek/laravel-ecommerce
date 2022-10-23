<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index',compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(SliderFormRequest $request)
    {
       $validatedData = $request->validated();

       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/sliders');
            $image->move($destinationPath, $name);
            $validatedData['image'] = "/images/sliders/$name";
       }

       $validatedData['status'] = $request->status == true ? 1 : 0;

       Slider::create([
              'title' => $validatedData['title'],
              'description' => $validatedData['description'],
              'image' => $validatedData['image'],
              'status' => $validatedData['status'],
       ]);

         return redirect()->route('admin.slider.index');
         toastr()->success('Slider Created Successfully');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.sliders.edit',compact('slider'));
    }

    public function update(SliderFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        $slider = Slider::find($id);
        $validatedData['status'] = $request->status == true ? 1 : 0;

        if ($request->hasFile('image')) {
            $path = public_path($slider->image);
            if (file_exists($path)) {
                unlink($path);
            }
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/sliders');
            $image->move($destinationPath, $name);
            $validatedData['image'] = "/images/sliders/$name";
            $slider->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'image' => $validatedData['image'],
                'status' => $validatedData['status'],
            ]);
        }else{
            $slider->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'status' => $validatedData['status'],
            ]);
        }
        return redirect()->route('admin.slider.index');
        toastr()->success('Slider Updated Successfully');
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        $path = public_path($slider->image);
        if (file_exists($path)) {
            unlink($path);
        }
        $slider->delete();
        return redirect()->route('admin.slider.index');
        toastr()->success('Slider Deleted Successfully');
    }

}
