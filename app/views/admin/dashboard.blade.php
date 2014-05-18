@extends('layout')

@section('content')
<div class="row">
	<h1>Dashboard</h1>

	@if($unpublished_comments_count)
			<p>{{ $unpublished_comments_count }} comments to moderate : {{ link_to_route('admin.comment.moderate', 'Moderate') }}</p>
	@endif

	<table class="table">
	<thead>
		<tr>
			<th>id</th>
			<th>Title</th>
			<th>Slug</th>
			<th>Published</th>
			<th>Created</th>
			<th>Updated</th>
			<th colspan="3">Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($posts AS $post)
		<tr class="{{{ $post->published ? 'published' : 'unpublished' }}}">
			<td>{{{ $post->id }}}</td>
			<td>{{{ $post->title }}}</td>
			<td>{{{ $post->slug }}}</td>
			<td>{{{ $post->published }}}</td>
			<td>{{{ $post->created_at }}}</td>
			<td>{{{ $post->updated_at }}}</td>
			<td><a href="{{ route('admin.edit', ['id' => $post->id]) }}" title="Modifier"><span class="glyphicon glyphicon-pencil"></span></a></td>
			<td><a href="{{ route('admin.togglePublished', ['id' => $post->id]) }}" title="{{ $post->published ? 'Dépublier' : 'Publier' }}">
				@if($post->published) 
					<span class="glyphicon glyphicon-remove-sign"></span>
				@else
					<span class="glyphicon glyphicon-ok-sign"></span>
				@endif	
			</a></td>
			<td><a href="{{ route('admin.delete', ['id' => $post->id]) }}" title="Supprimer"><span class="glyphicon glyphicon-trash"></span></a></td>
		</tr>
	@endforeach
	</tbody>
	</table>
</div>
@stop