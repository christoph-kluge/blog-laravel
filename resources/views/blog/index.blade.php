@extends('layouts.app')

@section('content')
    <div class="container">
        <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>
        <hr>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('post', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                    <em>
                        ({{ $post->published_at->format('M jS Y g:ia') }}
                        @if(Auth::check()) - <a href="{{ route('post-edit', ['slug' => $post->slug]) }}">Edit entry</a>@endif)
                    </em>
                    <p>{{ str_limit($post->content) }}</p>
                </li>
            @endforeach
        </ul>
        <hr>
        {!! $posts->render() !!}
    </div>
@endsection