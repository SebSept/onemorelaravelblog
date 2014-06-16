@extends(\Config::get('blog.theme').'::admin.layout')

@section('content')
<div class="container" id="post-content">
	<h1>{{{ $post->title }}}</h1>

	{{ Form::model($post, ['route'=> [ 'admin.post.submit', 'id'=> $post->id ], 'class' => 'form-horizontal', 'role' => 'form' ]) }}
        
		{{ Form::myInput('title', 'text', 'Titre') }}
		{{ Form::myInput('slug', 'text', 'URL') }}
		{{ Form::myInput('teaser', 'textarea', 'Résumé') }}
		{{ Form::myInput('content', 'textarea', 'Contenu') }}
		{{ Form::myInput('published', 'checkbox', 'Publié') }}

		{{-- Form::tagsSelector('tags', 'Tags') --}}
                
                {{-- just add 'hidden-tags' field that js generate in tag selector --}}
                {{ Form::text('hidden-tags') }}
		
		{{ Form::submit() }}

	{{ Form::close() }}
</div>
@stop

