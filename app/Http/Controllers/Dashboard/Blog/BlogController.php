<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPost::all();
        return view('dashboard.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'img' => 'file|image|mimes:jpeg,png,gif,jpg',
        ]);

        $data = $request->only(['title', 'slug', 'excerpt', 'content']);
        $data['slug'] = Str::slug($data['slug']);

        $data['img'] = $this->blogService->uploadImage($request);
        
        BlogPost::create($data);

        return redirect()->route('dashboard.blog.index')->with('success', 'Статья успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPost::find($id);
        return view('dashboard.blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'img' => 'file|image|mimes:jpeg,png,gif,jpg',
        ]);

        $post = BlogPost::find($id);
        $data = $request->only(['title', 'excerpt', 'content']);

        $data['img'] = $this->blogService->uploadImage($request, $post->img);

        $post->update($data);

        return redirect()->route('dashboard.blog.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPost::find($id);
        Storage::delete($post->img);
        $post->delete();

        return redirect()->route('dashboard.blog.index')->with('success', 'Пост удален');
    }
}
