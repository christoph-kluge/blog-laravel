@extends('blog.post-form')

@section('form-title')
    Edit Blog post
@endsection

@section('form-body')
    <form class="form-horizontal" role="form" method="POST" action="{{ $post->exists ? route('post-edit-save', ['slug' => $post->slug]) : route('post-new') }}">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Title</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">

                @if ($errors->has('title'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Content</label>

            <div class="col-md-6">
                <textarea class="form-control" rows="5" name="content">{{ old('content', $post->content) }}</textarea>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('published_at') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Publish date</label>

            <div class="col-md-6">
                <input type="datetime" class="form-control" name="published_at" value="{{ old('published_at', $post->published_at) }}">

                @if ($errors->has('published_at'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('published_at') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i>Update
                </button>
            </div>
        </div>
    </form>
@endsection