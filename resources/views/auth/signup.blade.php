@extends('layouts.app')
@section('content')




<div class="container d-flex justify-content-center">
    <div class="card col-lg-5 mt-3">
        <div class="card-body">
            <h4 class="mb-3">Signup</h4>
            <form action="{{ route('signup') }}" method="POST">
                @CSRF
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="eg. John Doe">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="youremail@gmail.com">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="*********">
                </div>
                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="*********">
                </div>
                <button type="submit" class="btn btn-primary">Signup</button>
                @if($error = session()->get('error'))
                <div class="alert alert-danger mt-3" role="alert">
                    {{ $error }}
                </div>
                @endif
            </form>
            <p class="mt-3">Already have an account? <a href="{{ route('login_page') }}">Login</a></p>
        </div>
    </div>
</div>

@endsection