<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'sub_heading' => 'required',
            'image' => 'required|image',
        ]);

        $path = $request->file('image')->store('public/sliders');

        Slider::create([
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'image_path' => $path,
        ]);

        return redirect()->route('sliders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'heading' => 'required',
            'sub_heading' => 'required',
            'image' => 'image',
        ]);

        $data = $request->only('heading', 'sub_heading');

        if ($request->hasFile('image')) {
            if ($slider->image_path) {
                Storage::delete($slider->image_path);
            }
            $data['image_path'] = $request->file('image')->store('public/sliders');
        }

        $slider->update($data);

        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image_path) {
            Storage::delete($slider->image_path);
        }
        $slider->delete();

        return redirect()->route('sliders.index');
    }
}
