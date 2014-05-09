@extends('layout')

@section('content')
<div class="row">
	<h1>Dashboard</h1>

	<table class="table">
	<thead>
		<tr>
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
		<tr>
			<td>{{{ $post->title }}}</td>
			<td>{{{ $post->slug }}}</td>
			<td>{{{ $post->published }}}</td>
			<td>{{{ $post->created_at }}}</td>
			<td>{{{ $post->updated_at }}}</td>
			<td>{{ link_to_route('admin.edit', 'Edit', ['id' => $post->id]) }}</td>
			<td>{{ link_to_route('admin.togglePublished', 'Publish/Unpublish', ['id' => $post->id]) }}</td>
			<td>{{ link_to_route('admin.delete', 'Delete', ['id' => $post->id]) }}</td>
		</tr>
	@endforeach
	</tbody>
	</table>
</div>
@stop