@extends('layouts.app')
@section('title', 'Edit')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('posts.update', [$post]) }}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="texr" class="form-control" id="title" value="{{ old('title', $post->title) }}" name="title">
        </div>
        <div class="mb-3">
            <label for="images">Choose file to upload</label>
            <input type="file" id="image" name="image" accept=".jpg, .png" />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $post->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags (Seperate each tag by , )</label>
            <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags',$tags) }}"
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Post Creator</label>
            <select class="form-select" aria-label="Default select example" name="postCreator">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        {{ old('postCreator', $post->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
