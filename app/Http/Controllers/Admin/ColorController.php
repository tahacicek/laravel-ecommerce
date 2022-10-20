<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }


    public function create()
    {
        return view('admin.colors.create');
    }

    public function edit($id)
    {
        $color = Color::find($id);
        return view('admin.colors.edit', compact('color'));
    }

    public function store(ColorFormRequest $request)
    {
        $validatedData = $request->validated();

        $color = new Color;
        $color->name = $validatedData['name'];
        $color->code = $validatedData['code'];
        $color->status = $request->status == true ? 1 : 0;
        $color->save();
        toastr()->success($request->name . " " . 'Rengi başarıyla oluşturuldu.', "Başarılı");
        return redirect()->route('admin.color.index');
    }

    public function update(ColorFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        $color = Color::find($id);
        $color->name = $validatedData['name'];
        $color->code = $validatedData['code'];
        $color->status = $request->status == true ? 1 : 0;

        $color->save();
        toastr()->success($request->name . " " . 'Rengi başarıyla güncellendi.', "Başarılı");
        return redirect()->route('admin.color.index');

    }

    public function delete(Request $request, $id)
    {
        $color = Color::find($id);
        $color->delete();
        toastr()->success('Başaryıla silindi.');
        return redirect()->route('admin.color.index');
    }
}
