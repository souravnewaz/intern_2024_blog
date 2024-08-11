@extends('layouts.app')
@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-12 col-md-8">
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Write Blog</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    @include('components.alerts')
                    <button class="btn btn-primary" type="submit">Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection