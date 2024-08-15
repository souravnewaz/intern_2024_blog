@extends('layouts.app')
@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-12 col-md-8">
        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title" placeholder="Title" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" name="image">
                    </div>
                    @include('components.alerts')
                    <button class="btn btn-primary" type="submit">Post</button>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-6 mb-3">
                @include('components.blog-list', ['blog' => $blog])
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection