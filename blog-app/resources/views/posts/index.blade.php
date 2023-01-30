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
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post['posted by'] }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <x-button type='primary' :route="route('posts.show', [$post])">View</x-button>
                        <x-button type='secondary' :route="route('posts.edit', [$post])">Edit</x-button>
                        <form action="{{route('posts.destroy', [$post])}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <h2>There's no posts yet!!</h2>
            @endforelse


        </tbody>
    </table>
@endsection
