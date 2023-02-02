<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    // public function store(Request $request)
    // {
    //     $post = Post::find($request->postId);
    //     $post->comments()->create(
    //         [
    //             'comment_body' => $request->commentBody
    //         ]
    //     );
    //     return redirect()
    //         ->route('posts.show', ['post' => $post]);
    // }
    // public function destroy(Comment $comment)
    // {
    //     $comment->deleteOrFail();
    //     return back()->withInput();
    // }
}
