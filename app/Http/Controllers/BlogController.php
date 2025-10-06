<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)->latest()->paginate(10);
        $categories = PostCategory::withCount('posts')->get();
        $tags = PostTag::withCount('posts')->get();
        $recent_posts = Post::where('status', 1)->latest()->take(5)->get();

        return view('blog.index', compact('posts', 'categories', 'tags', 'recent_posts'));
    }

    public function show(Post $post)
    {
        $post->load('category', 'tags');
        $categories = PostCategory::withCount('posts')->get();
        $tags = PostTag::withCount('posts')->get();
        $recent_posts = Post::where('status', 1)->where('id', '!=', $post->id)->latest()->take(5)->get();

        return view('blog.show', compact('post', 'categories', 'tags', 'recent_posts'));
    }
}
