@extends(\Config::get('blog.theme').'::layout')

<?php
use \SebSept\OMLB\Models\Comment\Comment;
?>

@section('head.meta')
    <title>{{{ $post->title }}}</title>
    <meta name="description" content="{{{ $post->teaser }}}" >
    
    {{-- twitter summary card | https://dev.twitter.com/docs/cards/types/summary-card --}}
    <meta name="twitter:card" content="summary">
    {{-- <meta name="twitter:site" content="@nytimes"> --}}
    {{-- <meta name="twitter:creator" content="@SarahMaslinNir"> --}}
    <meta name="twitter:title" content="{{{ $post->title }}}">
    <meta name="twitter:description" content="{{{ $post->teaser }}}">
@stop

@section('content')

    <div id="post-message-wrapper" class="hidden">
        <script type="text/javascript">
            if(document.location.hash == '#comment_submitted') {
                document.getElementById('post-message-wrapper').setAttribute('class','');
            }
        </script>
        <div class="container bg-success message">
            {{ trans('front.comment.submited') }}
        </div>
    </div>

    <div class="container" id="post-content">
        <h1>{{{ $post->title }}}</h1>

        <?php echo Markdown::render($post->content); ?>
    </div>

    @if(count($post->tags))
        <div class="container" id="post-tags">
            <h2>{{ trans('front.tags.header') }}</h2>

            <ul class="list-inline">
            @foreach($post->tags AS $tag)
                    <li>@tag($tag)</li>
            @endforeach
            </ul>
        </div>
    @endif
    
    @if(count($post->comments))
    <div class="container" id="post-comments">
        <h2>{{ trans('front.comments.header') }}</h2>

        <ul>
        @foreach($post->comments AS $comment)
                <li {{ $comment->is_admin ? ' class="admin-comment" ' : '' }} >
                    
                        <h3>{{ $comment->title }}</h3>
                        <p>{{ $comment->content }}</p>
                        <p class="author">
                            @if($comment->author_site && $comment->author_name)
                                {{ link_to($comment->author_site, $comment->author_name, ['rel' => 'nofollow']) }}
                            @elseif($comment->author_name)
                                {{ $comment->author_name }}
                            @endif
                            {{ trans('front.comment.on') }} {{ $comment->created_at->formatLocalized( \Config::get('blog.dateformat') ); }}
                        </p>
                </li>
        @endforeach
        </ul>
    </div>
    @endif

    <div class="container" id="post-form">
            <h3>{{ trans('front.comment.header') }}</h3>
            {{ Form::open(['route' => ['comment.add', 'post_id' => $post->id], 'class' => 'form-horizontal', 'role' => 'form'  ]) }}

                    {{ Form::myInput('title', 'text', trans('front.comment.title')) }}
                    {{ Form::myInput('author_name', 'text', trans('front.comment.name')) }}
                    {{ Form::myInput('author_site', 'text', trans('front.comment.url')) }}
                    {{ Form::myInput('content', 'textarea', trans('front.comment.content')) }}

                    {{ Form::submit(trans('front.comment.submit'), ['class' => 'col-md-offset-2']) }}
            {{ Form::close() }}
    </div>
@stop