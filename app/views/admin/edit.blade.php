@extends('layout')

@section('content')
	<h1>{{{ $post->title }}}</h1>

	{{ Form::model($post, ['route'=> [ 'admin.post', 'id'=> $post->id ], 'class' => 'form-horizontal' ]) }}

		{{ Form::text('title') }}
		{{ Form::text('slug') }}
		
		{{ Form::textarea('teaser') }}

		{{ Form::textarea('content') }}

		{{ Form::textarea('published') }}

		{{ Form::submit() }}

	{{ Form::close() }}
	
@stop