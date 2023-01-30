<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect()
            ->route('posts.index');
    }
    public function show(Post $post)
    {
        return view('posts.show', ["post" => $post]);
    }
    public function edit(Post $post)
    {
        return view('posts.edit', ["post" => $post]);
    }
    public function update(Request $request,Post $post)
    {
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect()
            ->route('posts.show',[$post]);
    }
    public function destroy(Post $post)
    {
        return redirect()
            ->route('posts.index');
    }
}
