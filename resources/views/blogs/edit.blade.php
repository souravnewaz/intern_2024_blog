@extends('layouts.app')
@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-12 col-md-8">
        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $blog->title }}" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="description" class="form-control" placeholder="Description">{{ $blog->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        @if($blog->image != null)
                        <img src="{{ asset($blog->image) }}" alt="" style="height: 200px;">
                        @endif
                        <input type="file" class="form-control mt-3" name="image">
                    </div>
                    @include('components.alerts')
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection