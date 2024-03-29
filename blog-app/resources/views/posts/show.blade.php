@extends('layouts.app')
@section('title', $post->title)
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            @if (Storage::disk('public')->exists('images/'.$post->id))
            <img src="{{asset('storage/images/'.$post->id)}}" class="card-img-top" style="max-height: 100px; max-width: 100px;" alt="..."> 
            @endif
            <h5 class="card-title">Title:  <span class="fw-normal card-text">{{ $post->title }}</span></h5>
            <h6 class="card-title">Description:  <span class="fw-normal card-text">{{ $post->description }}</span></h6>
            <h6 class="card-title">Tags:  <span class="fw-normal card-text">{{ $tags }}</span></h6>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h6 class="card-title">Name: <span class="fw-normal card-text">{{ $post->user->name ?? 'Admin' }}</span></h6>
            <h6 class="card-title">Email: <span
                    class="fw-normal card-text">{{ $post->user->email ?? 'admin@company.org' }}</span></h6>
            <h6 class="card-title">Created At: <span class="fw-normal card-text">
                    @if (!$post->user)
                        {{ 'Tue, Jan 31, 2023 12:46 PM' }}
                    @else
                        {{ $post->user->created_at->toDayDateTimeString() }}
                    @endif
                </span>
            </h6>
        </div>
    </div>
    <livewire:comments :postId="$post->id" :dbComments="$comments" />

@endsection
