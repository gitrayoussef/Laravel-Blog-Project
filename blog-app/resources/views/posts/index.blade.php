@extends('layouts.app')
@section('title', 'Index')
@section('content')  
<div class="text-center">
    <a href="/posts/create" class="mt-4 btn btn-success">Create Post</a>
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
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post['id'] }}</td>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['posted by'] }}</td>
                <td>{{ $post['created at'] }}</td>
                <td>
                    <a href="/posts/{{ $post['id'] }}" class="btn btn-info">View</a>
                    <a href="/posts/{{ $post['id'] }}/edit" class="btn btn-primary">Edit</a>
                    <form action="/posts/{{ $post['id'] }}" class="d-inline">
                        @method('delete')
                        @csrf()
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection