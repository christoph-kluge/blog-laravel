@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <h5>{{ $post->published_at->format('M jS Y g:ia') }}</h5>
        <hr>
        {!! nl2br(e($post->content)) !!}
        <hr>
        <button class="btn btn-primary" onclick="history.go(-1)">
            « Back
        </button>
        <a class="btn btn-info" href="{{ route('post-edit', ['slug' => $post->slug]) }}">Edit</a>
    </div>
@endsection