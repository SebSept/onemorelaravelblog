@extends('layout')

@section('content')
<div class="container" id="post-content">
	<h1>{{{ $post->title }}}</h1>

	{{ Form::model($post, ['route'=> [ 'admin.post', 'id'=> $post->id ], 'class' => 'form-horizontal', 'role' => 'form' ]) }}

		{{ Form::myInput('title', 'text', 'Titre') }}
		{{ Form::myInput('slug', 'text', 'URL') }}
		{{ Form::myInput('teaser', 'textarea', 'Résumé') }}
		{{ Form::myInput('content', 'textarea', 'Contenu') }}
		{{ Form::myInput('published', 'checkbox', 'Publié') }}
		
		{{ Form::submit() }}

	{{ Form::close() }}
</div>
@stop

