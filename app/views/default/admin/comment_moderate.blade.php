@extends(Config::get('blog.theme').'::admin.layout')

@section('content')
        <div class="container" id="post-content">
	{{ link_to_route('admin.dashboard', 'Retour Admin') }}
	<h1>Moderate unpublished comments</h1>

	<table class="table">
		<thead>
			<tr>
				<?php $comment = Comment::get()->first(); ?>
				@foreach(array_keys($comment->getAttributes()) AS $attribute)
					<th>{{{ $attribute }}}</th>
				@endforeach
				<th colspan="2">Action</th>
			</tr>
		</thead>
	
		<tbody>
			@foreach($unpublished_comments AS $comment)
				<tr>
					@foreach($comment->getAttributes() AS $attribute => $value)
						<td>
							{{{ $value }}}
						</td>
					@endforeach
					<td>{{ link_to_route('admin.comment.delete', 'Delete', ['comment_id' => $comment->id], ['class' => 'btn btn-warning']) }}</td>
					<td>{{ link_to_route('admin.comment.approuve', 'Approuve', ['comment_id' => $comment->id], ['class' => 'btn btn-success']) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<?php echo $unpublished_comments->links(); ?>
        </div>
@stop