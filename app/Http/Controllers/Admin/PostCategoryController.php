<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postCategories = PostCategory::latest()->paginate(10);
        return view('admin.post-categories.index', compact('postCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:post_categories',
            'description' => 'nullable|string',
        ]);

        PostCategory::create($request->all());

        return redirect()->route('admin.post-categories.index')
            ->with('success', 'Post category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostCategory $postCategory)
    {
        return view('admin.post-categories.show', compact('postCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $postCategory)
    {
        return view('admin.post-categories.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostCategory $postCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:post_categories,slug,' . $postCategory->id,
            'description' => 'nullable|string',
        ]);

        $postCategory->update($request->all());

        return redirect()->route('admin.post-categories.index')
            ->with('success', 'Post category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();

        return redirect()->route('admin.post-categories.index')
            ->with('success', 'Post category deleted successfully.');
    }
}
