<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostTag;
use Illuminate\Http\Request;

class PostTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postTags = PostTag::latest()->paginate(10);
        return view('admin.post-tags.index', compact('postTags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post-tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:post_tags',
        ]);

        PostTag::create($request->all());

        return redirect()->route('admin.post-tags.index')
            ->with('success', 'Post tag created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostTag $postTag)
    {
        return view('admin.post-tags.show', compact('postTag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostTag $postTag)
    {
        return view('admin.post-tags.edit', compact('postTag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostTag $postTag)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:post_tags,slug,' . $postTag->id,
        ]);

        $postTag->update($request->all());

        return redirect()->route('admin.post-tags.index')
            ->with('success', 'Post tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostTag $postTag)
    {
        $postTag->delete();

        return redirect()->route('admin.post-tags.index')
            ->with('success', 'Post tag deleted successfully.');
    }
}
