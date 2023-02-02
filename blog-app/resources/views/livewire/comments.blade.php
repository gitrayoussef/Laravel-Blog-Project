<div>
    <h4 class="mt-3">Comments</h4>
    <div class=" mt-3">
        <form action="" class="d-inline" wire:submit.prevent="addComment">
            @csrf
            <div class="form-floating mb-2">
                <input class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                    wire:model="newComment" />
                <label for="floatingTextarea">Comments</label>
            </div>
            <button type="submit" class="btn btn-primary">
                Comment
            </button>
        </form>
    </div>
    @if ($comments)
        <div class="card mt-3">
            <ul class="list-group list-group-flush">
                @foreach ($comments as $comment)
                    <li class="list-group-item d-flex justify-content-between">{{ $comment->comment_body }}
                        <form action="">
                            <button type="submit"  class="btn btn-danger"
                                wire:click="deleteComment({{ $comment->id }})">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
