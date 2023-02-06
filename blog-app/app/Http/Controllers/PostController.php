<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::withTrashed()->paginate(50);
        // foreach($posts as $post) {
        //     $post->touch();
        // }
        return view('posts.index', ['posts' => $posts]);
    }
    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $post = Post::create(
            [
                'title' => $validated['title'],
                'description' => $validated['description'],
                'user_id' => $validated['postCreator'],
            ]
        );
        $tags = explode(',', $validated['tags']);
        $post->attachTags($tags);
        $validated['image']->storeAs('images', $post->id, 'public');
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
        $tags = $post->tags->pluck('name');
        foreach ($tags as $key => $value) {
            $results[] = $value;
        }
        $tags = implode(',', $results);
        return view('posts.edit', ["post" => $post, 'users' => $users, 'tags' => $tags]);
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();
        Validator::make($validated, [
            'title' => [Rule::unique('users')->ignore($post)]
        ]);
        Storage::disk('public')->delete('images/' . $post->id);
        $validated['image']->storeAs('images', $post->id, 'public');
        $post->update(
            [

                'title' => $validated['title'],
                'description' => $validated['description'],
                'user_id' => $validated['postCreator'],
            ]
        );
        $tags = explode(',', $validated['tags']);
        $post->attachTags($tags);
        return redirect()
            ->route('posts.show', [$post]);
    }
    public function destroy($id)
    {
        $post = Post::findorFail($id);
        Storage::disk('public')->delete('images/' . $post->id);
        $post->deleteOrFail();
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
