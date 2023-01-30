@extends('layouts.app')
@section('title', 'Edit')
@section('content')
<form action="{{route('posts.update',[$post])}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="texr" class="form-control" id="title"  value="{{old('title',$post->title)}}" name="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" rows="3" name="description">{{old('description',$post->description)}}</textarea>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Post Creator</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Ahmed</option>
            <option value="Muhammed">Muhammed</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection