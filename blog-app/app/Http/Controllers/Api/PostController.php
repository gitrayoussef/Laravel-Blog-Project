<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->paginate();
        return PostResource::collection($posts);
    }
    public function show($postId)
    {
        $post = Post::find($postId);
        return new PostResource($post);
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
        return $post;
    }
}
