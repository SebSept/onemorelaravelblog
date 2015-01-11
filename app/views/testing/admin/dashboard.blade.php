@extends(\Config::get('blog.theme').'::admin.layout')

@section('content')
<div class="container">
	<h1>{{ trans('admin.dashboard') }}</h1>

	@if($unpublished_comments_count)
        <p class="well well-sm">{{ trans('admin.comment.x_comments_to_moderate', ['comments_count' => $unpublished_comments_count]) }} : {{ link_to_route('admin.comment.moderate', trans('admin.comment.moderate')) }}
        </p>
	@endif

        <p class="actions">{{ link_to_route('admin.post.edit', trans('admin.post.new'), [], ['class' => 'btn btn-primary']) }}</p>
	<table class="table">
	<thead>
		<tr>
			<th>{{ trans('admin.post.field.id') }}</th>
			<th>{{ trans('admin.post.field.title') }}</th>
			<th>{{ trans('admin.post.field.slug') }}</th>
			<th>{{ trans('admin.post.field.published') }}</th>
			<th>{{ trans('admin.post.field.created_at') }}</th>
			<th>{{ trans('admin.post.field.updated_at') }}</th>
			<th colspan="4">{{ trans('admin.post.actions') }}</th>
		</tr>
	</thead>
	<tbody>
	@foreach($posts AS $post)
		<tr class="{{{ $post->published ? trans('admin.post.published') : trans('admin.post.unpublished') }}}">
			<td>{{{ $post->id }}}</td>
			<td>{{{ $post->title }}}</td>
			<td>{{{ $post->slug }}}</td>
			<td>{{{ $post->published }}}</td>
			<td>{{{ $post->created_at }}}</td>
			<td>{{{ $post->updated_at }}}</td>
                        {{-- edit --}}
			<td><a href="{{ route('admin.post.edit', ['id' => $post->id]) }}" title="{{ trans('admin.post.update') }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        {{-- toogle published --}}
			<td><a href="{{ route('admin.post.togglePublished', ['id' => $post->id]) }}" title="{{ $post->published ? trans('admin.post.publish') : trans('admin.post.unpublish') }}">
				@if($post->published) 
					<span class="glyphicon glyphicon-remove-sign"></span>
				@else
					<span class="glyphicon glyphicon-ok-sign"></span>
				@endif	
			</a></td>
                        
                        {{-- preview post --}}
                        <td>
                        <a href="{{ route('admin.post.preview', ['slug' => $post->slug]) }}" title="{{ trans('admin.post.preview') }}">
				@if($post->published) 
					<span class="glyphicon glyphicon-edit"></span>
				@else
					<span class="glyphicon glyphicon-edit"></span>
				@endif	
			</a>
                        </td>
                        
                        {{-- delete --}}
			<td>{{ Form::open([ 'route' => ['admin.post.destroy', 'id' => $post->id ], 'id' => 'delete_btn_'.$post->id ]) }}
                            {{ Form::close() }}
                            <span class="glyphicon glyphicon-trash" title="{{ trans('admin.post.destroy') }}" 
                                  onclick="document.getElementById('delete_btn_{{$post->id}}').submit(); return false;"></span>
                        </td>
		</tr>
	@endforeach
	</tbody>
	</table>

    <p class="actions">{{ link_to_route('admin.cache.flush', trans('admin.cache.flush'), [], ['class' => 'btn btn-warning']) }}</p>

</div>
@stop