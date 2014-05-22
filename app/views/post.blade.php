@extends('layout')

@section('content')

    <div class="container" id="post-content">
        <h1>{{{ $post->title }}}</h1>

        <p><?php echo Markdown::render($post->content); ?></p>
    </div>

    @if(count($post->tags))
        <div class="container" id="post-tags">
            <h2>{{ trans('front.tags.header') }}</h2>

            <ul class="list-inline">
            @foreach($post->tags AS $tag)
                    <li>@tag($tag)</li>
            @endforeach
            </ul>
        </div>
    @endif
    
    @if(count($post->comments))
    <div class="container" id="post-comments">
        <h2>{{ trans('front.comments.header') }}</h2>

        <ul>
        @foreach($post->comments AS $comment)
                <li>
                        <h3>{{ $comment->title }}</h3>
                        <p>{{ $comment->content }}</p>
                </li>
        @endforeach
        </ul>
    </div>
    @endif

    <div class="container" id="post-form">
	<h3>{{ trans('front.comment.header') }}</h3>
	{{ Form::open(['route' => ['comment.add', 'post_id' => $post->id], 'class' => 'form-horizontal', 'role' => 'form'  ]) }}

		{{ Form::myInput('title', 'text', trans('front.comment.title')) }}
		{{ Form::myInput('author_name', 'text', trans('front.comment.name')) }}
		{{ Form::myInput('author_site', 'text', trans('front.comment.url')) }}
		{{ Form::myInput('content', 'textarea', trans('front.comment.content')) }}

		{{ Form::submit(trans('front.comment.submit'), ['class' => 'col-md-offset-2']) }}
	{{ Form::close() }}
    </div>
@stop