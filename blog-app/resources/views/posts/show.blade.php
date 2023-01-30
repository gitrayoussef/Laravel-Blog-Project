@extends('layouts.app')
@section('title',$post ->title)
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: <span class="fw-normal card-text">{{$post -> title}}</span></h5>
            <h6 class="card-title">Description:</h6>
            <span class="card-text">{{$post -> description}}</span>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h6 class="card-title">Name: <span class="fw-normal card-text">{{$post -> title}}</span></h6>
            <h6 class="card-title">Email: <span class="fw-normal card-text">{{$post -> title}}</span></h6>
            <h6 class="card-title">Created At: <span class="fw-normal card-text">{{$post -> title}}</span></h6>
        </div>
    </div>
@endsection