<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $slug = Str::slug($request->name);
        $count = Brand::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $logoName = null;
        if ($request->hasFile('logo')) {
            $logoName = $slug . '-' . time() . '.' . $request->logo->extension();
            Storage::disk('brands')->put($logoName, file_get_contents($request->logo));
        }

        Brand::create([
            'name' => $request->name,
            'slug' => $slug,
            'logo' => $logoName,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand created successfully.');
    }

    public function show(Brand $brand)
    {
        return view('admin.brands.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $slug = Str::slug($request->name);
        $count = Brand::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $brand->id)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $data = $request->only('name', 'meta_title', 'meta_description', 'meta_keywords');
        $data['slug'] = $slug;

        if ($request->hasFile('logo')) {
            if ($brand->logo && Storage::disk('brands')->exists($brand->logo)) {
                Storage::disk('brands')->delete($brand->logo);
            }
            $logoName = $slug . '-' . time() . '.' . $request->logo->extension();
            Storage::disk('brands')->put($logoName, file_get_contents($request->logo));
            $data['logo'] = $logoName;
        }

        $brand->update($data);

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand updated successfully');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->logo && Storage::disk('brands')->exists($brand->logo)) {
            Storage::disk('brands')->delete($brand->logo);
        }
        $brand->delete();

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand deleted successfully');
    }
}
