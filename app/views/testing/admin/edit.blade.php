@extends(\Config::get('blog.theme').'::admin.layout')

@section('content')
<div class="container" id="post-content">
	<h1>{{{ $post->title }}}</h1>

	{{ Form::model($post, ['route'=> [ 'admin.post.submit', 'id'=> $post->id ], 'class' => 'form-horizontal', 'role' => 'form' ]) }}

		{{ Form::myInput('title', 'text', trans('admin.post.field.title')) }}
		{{ Form::myInput('slug', 'text', trans('admin.post.field.slug')) }}
		{{ Form::myInput('teaser', 'textarea', trans('admin.post.field.teaser')) }}
		{{ Form::myInput('content', 'textarea', trans('admin.post.field.content')) }}
		{{ Form::myInput('published', 'checkbox', trans('admin.post.field.published')) }}

   
                {{-- just add 'hidden-tags' field that js generate in tag selector --}}
                {{ Form::text('hidden-tags') }}
		
		{{ Form::submit() }}

	{{ Form::close() }}
</div>
@stop

