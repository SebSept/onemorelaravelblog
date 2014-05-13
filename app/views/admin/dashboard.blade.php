@extends('layout')

@section('content')
<div class="row">
	<h1>Dashboard</h1>

	<table class="table">
	<thead>
		<tr>
			<th>id</th>
			<th>Title</th>
			<th>Slug</th>
			<th>Published</th>
			<th>Created</th>
			<th>Updated</th>
			<th>Action</th>
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
			<td><a href="{{ route('admin.edit', ['id' => $post->id]) }}" title="Modifier"><span class="glyphicon glyphicon-search"></span></a></td>
			
			<!-- <td>{{ link_to_route('admin.edit', 'Edit', ['id' => $post->id]) }}</td> -->
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