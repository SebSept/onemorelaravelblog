@extends('layout')

@section('content')
<div class="container" id="list">
    @if(isset($list_title) && $list_title)
        <h1>{{ $list_title }}</h1>
    @endif

    @foreach($posts AS $post)
        <h2>{{ link_to_route('post.view', $post->title, ['slug' => $post->slug]) }}</h2>
        <p>{{{ $post->teaser }}}</p>
        <p>{{ link_to_route('post.view', $post->title, ['slug' => $post->slug]) }}</p>
    @endforeach

    <?php echo $posts->links(); ?>
</div>
@stop
