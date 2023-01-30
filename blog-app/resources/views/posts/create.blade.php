@extends('layouts.app')
@section('title', 'Create')
@section('content')
<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Post Creator</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Ahmed</option>
            <option value="Muhammed">Muhammed</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>
@endsection