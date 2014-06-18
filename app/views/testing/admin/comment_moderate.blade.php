@extends(\Config::get('blog.theme').'::admin.layout')
<?php 
use OMLB\Models\Comment\Comment;
?>

@section('content')
        <div class="container" id="post-content">
	{{ link_to_route('admin.dashboard', trans('admin.back_to_dashboard')) }}
	<h1>{{ trans('admin.comment.moderate') }}</h1>

        @if( count($unpublished_comments) )
	<table class="table">
		<thead>
			<tr>
                                <?php $comment = Comment::get()->first(); ?>
				@foreach(array_keys($comment->getAttributes()) AS $attribute)
					<th>{{{ trans('admin.comment.field.'.$attribute) }}}</th>
				@endforeach
				<th colspan="2">{{ trans('admin.comment.actions') }}</th>
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
					<td>{{ link_to_route('admin.comment.delete', trans('admin.comment.delete'), ['comment_id' => $comment->id], ['class' => 'btn btn-warning']) }}</td>
					<td>{{ link_to_route('admin.comment.approuve', trans('admin.comment.approve'), ['comment_id' => $comment->id], ['class' => 'btn btn-success', 'id' => 'approve_'.$comment->id]) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<?php echo $unpublished_comments->links(); ?>
        @else
            <p class="success">{{ trans('admin.comment.none_to_moderate') }}</p>
        @endif
        </div>
@stop