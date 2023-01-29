@extends('layouts.app')
@section('title', 'Edit')
@section('content')
<form action="/posts/{{ $postId }}">
    @method('put')
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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