@extends('layouts.app')
@section('content')

@foreach ($blogs as $blog)
@include('components.blog-list', ['blog' => $blog])
@endforeach

@endsection