<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Comments extends Component
{

    public $comments;
    public $newComment;
    public $postId;
    public function mount($dbComments, $postId)
    {
        $this->comments = $dbComments;
        $this->postId = $postId;
    }

    public function addComment()
    {
        if ($this->newComment == '') {
            return;
        } else {
            $post = Post::find($this->postId);
            $adddedComment = $post->comments()->create(
                [
                    'comment_body' => $this->newComment
                ]
            );
            $this->comments->push($adddedComment);
            $this->newComment = "";
        }
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }


    public function render()
    {
        return view('livewire.comments');
    }
}
