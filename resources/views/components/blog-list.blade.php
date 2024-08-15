<?php

if ($blog->image == null) {
    $image = 'images/default.png';
} else {
    $image = $blog->image;
}
?>

<div class="card mt-2">
    <img src="{{ asset($image) }}" alt="">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h6 class="mb-0">
                <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a>
            </h6>
            <p class="small text-muted mb-0">{{ $blog->created_at->diffForHumans() }}</p>
        </div>
        <p class="small mb-0">{{ $blog->user->name }}</p>
    </div>
    <div class="card-body">
        <p class="mb-0">{{ $blog->description }}</p>
    </div>
    @if(auth()->check() && auth()->id() == $blog->user_id)
    <div class="card-footer">
        <div class="d-flex">
            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-info btn-sm">Edit</a>
            <form action="{{ route('blogs.delete', $blog->id) }} " method="POST">
                @CSRF
                <button class="btn btn-danger btn-sm ms-1" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
    @endif
</div>