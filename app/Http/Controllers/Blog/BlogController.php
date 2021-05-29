<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::all();
        return view('blog.index', compact('posts'));
    }

    public function showPost($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();

        $randomPosts = BlogPost::inRandomOrder()
            ->limit(3)
            ->get();

        return view('blog.show', compact('post', 'randomPosts'));
    }
}
