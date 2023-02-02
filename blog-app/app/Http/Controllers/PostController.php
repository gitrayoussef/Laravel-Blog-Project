<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::withTrashed()->paginate(50);
        return view('posts.index', ['posts' => $posts]);
    }
    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }
    public function store(Request $request)
    {
        $post = Post::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->postCreator
            ]
        );
        return redirect()
            ->route('posts.show', ['post' => $post]);
    }
    public function show(Post $post)
    {
        return view('posts.show', ["post" => $post, 'comments' => $post->comments]);
    }
    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', ["post" => $post, 'users' => $users]);
    }
    public function update(Request $request, Post $post)
    {
        $post->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->postCreator
            ]
        );

        return redirect()
            ->route('posts.show', [$post]);
    }
    public function destroy($id)
    {
        $post = Post::find($id)->deleteOrFail();
        return redirect()
            ->route('posts.index');
    }
    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()
            ->route('posts.show', ['post' => $post]);
    }
    public function showAjax(Post $post)
    {
        return response([
            'title' => $post->title,
            'description' => $post->description,
            'username' => $post->user->name ?? 'Admin',
            'useremail' => $post->user->email ?? 'admin@company.org',
        ]);
    }
}
