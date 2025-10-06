<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)->latest()->paginate(10);
        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post_categories = PostCategory::all();
        return view('blog.show', compact('post', 'post_categories'));
    }
}
