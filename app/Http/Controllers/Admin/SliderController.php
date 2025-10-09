<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'heading' => 'required',
            'sub_heading' => 'required',
        ]);

        $imagePath = $request->file('image_path')->store('sliders', 'public');

        Slider::create([
            'image_path' => $imagePath,
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'link' => $request->link,
            'button_text' => $request->button_text,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'heading' => 'required',
            'sub_heading' => 'required',
        ]);

        $imagePath = $slider->image_path;
        if ($request->hasFile('image_path')) {
            Storage::disk('public')->delete($imagePath);
            $imagePath = $request->file('image_path')->store('sliders', 'public');
        }

        $slider->update([
            'image_path' => $imagePath,
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'link' => $request->link,
            'button_text' => $request->button_text,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        Storage::disk('public')->delete($slider->image_path);
        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
