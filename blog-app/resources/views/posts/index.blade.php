@extends('layouts.app')
@section('title', 'Index')
@section('content')
    <div class="text-center">
        <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
    </div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col" >Slug</th>
                <th scope="col" >Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col" class="w-25">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    @if (Storage::disk('public')->exists('images/' . $post->id))
                        <td><img src="{{ asset('storage/images/' . $post->id) }}" class="img-thumbnail"
                                style="max-height: 80px; max-width: 80px;" alt="..."></td>
                    @else
                        <td>{{ 'Not Uploaded' }}</td>
                    @endif
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->user->name ?? 'Admin' }}</td>
                    <td>{{ $post->human_readable_date }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        @if ($post->trashed())
                            <button type="button" class="btn btn-success restoreBtn"
                                value="{{ $post->id }}">Restore</button>
                            <!-- Modal -->
                            <form action="" id='restoreForm' method="post" class="d-inline">
                                @csrf
                                <div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Restore Deleted</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to Restore that post?!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">
                                                    Restore
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <x-button type='primary' :route="route('posts.show', [$post])">View</x-button>
                            <button class="btn btn-primary viewBtn btn-sm" value="{{ $post->id }}"
                                data-bs-toggle="modal" data-bs-target="#viewModal">View AJAX</button>
                            <x-button type='secondary' :route="route('posts.edit', [$post])">Edit</x-button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger deleteBtn btn-sm"
                                value="{{ $post->id }}">Delete</button>
                            <!-- Modal -->
                            <form action="" id='deleteForm' method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this post?!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <h2>There's no posts yet!!</h2>
            @endforelse
        </tbody>
    </table>
    <div>{{ $posts->links() }}</div>
    {{-- Start of modal view --}}
    <!-- Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">View Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title text-secondary">Title</h5>
                            <p class="fw-normal card-text " id="postTitle"></p>
                            <h5 class="card-title text-secondary">Description</h5>
                            <p class="fw-normal card-text" id="postDescription"></p>
                            <h5 class="card-title text-secondary">Name</h5>
                            <p class="fw-normal card-text" id="postUsername"></p>
                            <h5 class="card-title text-secondary">Email</h5>
                            <p class="fw-normal card-text" id="postUserEmail"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End of modal view --}}
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener("click", function(e) {
            if (e.target && e.target.matches(".deleteBtn")) {
                let value = e.target.value;
                document.querySelector('#deleteForm').setAttribute('action',
                    `posts/${value}`)
                const myModal = new bootstrap.Modal('#deleteModal', {
                    keyboard: false
                })
                myModal.show();
            }
        })
        document.addEventListener("click", function(e) {
            if (e.target && e.target.matches(".restoreBtn")) {
                let value = e.target.value;
                document.querySelector('#restoreForm').setAttribute('action',
                    `posts/${value}`);
                const myModal = new bootstrap.Modal('#restoreModal', {
                    keyboard: false
                })
                myModal.show();
            }
        })
        document.addEventListener("click", async function(e) {
            if (e.target && e.target.matches(".viewBtn")) {
                let value = e.target.value;
                let res = await fetchUrlData(`/posts/${value}/AJAX`);
                appendData(res)

            }
        })
        async function fetchUrlData(url) {
            let response = await fetch(url);
            let jsonValue = await response.json();
            console.log(jsonValue);
            return jsonValue;
        }

        function appendData(res) {
            document.getElementById('postTitle').textContent = res.title;
            document.getElementById('postDescription').textContent = res.description;
            document.getElementById('postUsername').textContent = res.username;
            document.getElementById('postUserEmail').textContent = res.useremail;
        }
    </script>
@endsection
