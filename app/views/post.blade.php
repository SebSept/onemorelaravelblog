@extends('layout')

@section('content')
	<h1>{{{ $post->title }}}</h1>

	<p><?php echo Markdown::render($post->content); ?></p>

	@if(count($post->tags))
		<h2>Tags</h2>

		<ul class="list-inline">
		@foreach($post->tags AS $tag)
			<li>@tag($tag)</li>
		@endforeach
		</ul>
	@endif

	@if(count($post->comments))
		<h2>Comments</h2>
		
		<ul>
		@foreach($post->comments AS $comment)
			<li>
				<h3>{{ $comment->title }}</h3>
				<p>{{ $comment->content }}</p>
			</li>
		@endforeach
		</ul>
	@endif

	<h3>Your comment</h3>
	{{ Form::open(['route' => ['comment.add', 'post_id' => $post->id], 'class' => 'form-horizontal', 'role' => 'form'  ]) }}

		{{ Form::myInput('title', 'text', 'Titre *') }}
		{{ Form::myInput('author_name', 'text', 'Votre nom *') }}
		{{ Form::myInput('author_site', 'text', 'Votre site') }}
		{{ Form::myInput('content', 'textarea', 'Commentaire') }}

		{{ Form::submit('Envoyer', ['class' => 'col-md-offset-2']) }}
	{{ Form::close() }}
@stop