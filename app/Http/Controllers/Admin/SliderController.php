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

}
