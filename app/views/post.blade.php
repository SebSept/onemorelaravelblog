@extends('layout')

@section('content')
	<h1>{{{ $post->title }}}</h1>

	<p>{{{ $post->content }}}</p>

	@if($post->tags)
		<ul>
		@foreach($post->tags AS $tag)
			<li>@tag($tag)</li>
		@endforeach
		</ul>
	@endif
@stop