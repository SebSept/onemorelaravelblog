@extends('layout')

@section('content')
	@foreach($posts AS $post)
		<h2>{{{ $post->title }}}</h2>
		<p>{{{ $post->teaser }}}</p>
		<p>Published : {{{ $post->published }}}</p>
		<p><a href="{{{ $post->slug }}}">Lire {{{ $post->slug }}}</a></p>
	@endforeach

	<?php echo $posts->links(); ?>
@stop
