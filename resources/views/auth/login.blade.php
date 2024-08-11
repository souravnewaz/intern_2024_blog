@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center">
    <div class="card col-lg-5 mt-5">
        <div class="card-body">
            <h4 class="mb-3">Login</h4>
            <form action="{{ route('login') }}" method="POST">
                @CSRF
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="youremail@gmail.com">
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="*********">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                @if($error = session()->get('error'))
                <div class="alert alert-danger mt-3" role="alert">
                    {{ $error }}
                </div>
                @endif
            </form>
            <p class="mt-3">New here? <a href="{{ route('signup_page') }}">Signup</a></p>
        </div>
    </div>
</div>

@endsection