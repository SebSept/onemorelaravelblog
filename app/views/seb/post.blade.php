@extends(Config::get('blog.theme').'::layout')

@section('content')

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
                            {{ trans('front.comment.on') }} {{ $comment->created_at->formatLocalized( Config::get('blog.dateformat') ); }}
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
        @stop
        @yield('override.post.commentform')
    </div>
@stop