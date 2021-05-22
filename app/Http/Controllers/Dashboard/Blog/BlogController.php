<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
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

        //Обработка картинки, если есть
        if($request->hasFile('img')){
            $img = $request->file('img');
            $folderYear = date('Y');
            $folderMonth = date('m');
            $imgName = "{$data['slug']}-{$folderMonth}-{$folderYear}.{$img->extension()}";
            $data['img'] = $img->storeAs("/public/uploads/images/{$folderYear}/{$folderMonth}", $imgName);
        }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
