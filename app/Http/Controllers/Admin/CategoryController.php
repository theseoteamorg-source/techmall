<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'include_in_sitemap' => 'required|boolean',
        ]);

        $slug = Str::slug($request->name);
        $count = Category::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $iconName = null;
        if ($request->hasFile('icon')) {
            $iconName = $slug . '-' . time() . '.' . $request->icon->extension();
            Storage::disk('categories')->put($iconName, file_get_contents($request->icon));
        }

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'icon' => $iconName,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'include_in_sitemap' => $request->include_in_sitemap,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'include_in_sitemap' => 'required|boolean',
        ]);

        $slug = Str::slug($request->name);
        $count = Category::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $category->id)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $data = $request->only('name', 'meta_title', 'meta_description', 'meta_keywords', 'include_in_sitemap');
        $data['slug'] = $slug;

        if ($request->hasFile('icon')) {
            if ($category->icon && Storage::disk('categories')->exists($category->icon)) {
                Storage::disk('categories')->delete($category->icon);
            }
            $iconName = $slug . '-' . time() . '.' . $request->icon->extension();
            Storage::disk('categories')->put($iconName, file_get_contents($request->icon));
            $data['icon'] = $iconName;
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        if ($category->icon && Storage::disk('categories')->exists($category->icon)) {
            Storage::disk('categories')->delete($category->icon);
        }
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
