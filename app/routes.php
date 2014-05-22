<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */


/**
 * Backoffice routes
 * */
Route::group(['prefix' => 'admin', 'before' => 'auth.basic'], function() {

    Route::get('/', ['as' => 'admin.dashboard', function() {
    $posts = Post::orderBy('created_at')->paginate(25);
    $unpublished_comments_count = Comment::wherePublished('0')->count();
    return View::make('admin.dashboard', compact('posts', 'unpublished_comments_count'))->render();
}]);

    // edit/post
    // edit
    Route::get('/edit/{id}', ['as' => 'admin.edit', function($id) {
    $post = Post::whereId($id)->first();
    return View::make('admin.edit', compact('post'))->render();
}]);
    // post
    Route::post('/edit/{id}', ['as' => 'admin.post', function($id) {
    $post = Post::whereId($id)->first();
    $inputs = Input::only(['title', 'slug', 'teaser', 'content', 'published']);
    $inputs['published'] = is_null($inputs['published']) ? 0 : 1;
    if ($post->update($inputs))
    {
        return Redirect::route('admin.dashboard')->with('message', 'Enregistré.');
    }
    return Redirect::back()->withInput();
}]);

    Route::get('/togglePublished/{id}', ['as' => 'admin.togglePublished', function($id) {
    $post = Post::whereId($id)->first();
    $post->published = abs($post->published - 1);
    $post->save();
    return Redirect::back()->with('message', $post->published ? 'published' : 'unpublished');
}]);

    Route::get('/delete/{id}', ['as' => 'admin.delete', function($id) {
    trigger_error('implement me (as POST)');
    $post = Post::whereId($id)->first();
    return View::make('admin.delete', compact('post'))->render();
}]);

    Route::get('/comment/moderate', ['as' => 'admin.comment.moderate', function() {
    $unpublished_comments = Comment::wherePublished('0')->paginate(Config::get('app.comments_per_page_admin', 20));
    return View::make('admin.comment_moderate', compact('unpublished_comments'));
}]);

    Route::get('/comment/approuve/{comment_id}', ['as' => 'admin.comment.approuve', function($comment_id) {
    $comment = Comment::whereId($comment_id)->first();
    if ($comment->approve())
    {
        return Redirect::back()->with('message', 'Commentaire approuvé');
    }
    return Redirect::back()->with('error', 'Echec approbation commentaire !');
}]);

    Route::get('/comment/delete/{comment_id}', ['as' => 'admin.comment.delete', function($comment_id) {
        $comment = Comment::whereId($comment_id)->first();
        if ($comment->delete())
        {
            return Redirect::back()->with('message', 'Commentaire supprimé.');
        }
    }]);


    Route::get('/post/preview/{slug}', ['as' => 'admin.post.preview',  'before' => '', function($slug) {
        $post = Post::whereSlug($slug)
//                ->wherePublished('1')
                ->with(['comments' => function($query) {
                $query->wherePublished('1');
            }, 'tags'])
                ->first();
        if ($post)
        {
            return View::make('post', compact('post'))->render();
        }
        app::abort(404);
    }]);
});


/**
 * Front office routes
 * */
Route::group(['before' => 'cache_retrieve', 'after' => 'cache_create'], function() {
    Route::get('/home', ['as' => 'home', function() {
    $posts = Post::wherePublished('1')->orderBy('created_at')->paginate(Config::get('app.posts_per_page'));
    return View::make('home', compact('posts'))->render();
}
    ]);

    Route::get('/tag/{tag}', ['as' => 'tag.view', function($tag) {
    $tag = Tag::whereTitle($tag)->first();
    if ($tag)
    {
        $posts = Post::wherePublished('1')
                ->with(['tags' => function($query) use ($tag) {
                $query->whereId($tag->id);
            }])
                ->paginate(Config::get('app.posts_per_page'));
        $list_title = Lang::get('front.list.header.posts tagged' , ['title' => $tag->title]);
        return View::make('home', compact('posts', 'list_title'))->render();
    }
    app::abort(404);
}]);

    Route::get('/{slug}', ['as' => 'post.view', function($slug) {
    $post = Post::whereSlug($slug)
            ->wherePublished('1')
            ->with(['comments' => function($query) {
            $query->wherePublished('1');
        }, 'tags'])
            ->first();
    if ($post)
    {
        return View::make('post', compact('post'))->render();
    }
    app::abort(404);
}
            ]
    );
});

Route::post('/comment/add/{post_id}', ['as' => 'comment.add', function($post_id) {
$comment = new Comment(Input::only(['title', 'author_name', 'author_site', 'content']));
$comment->post_id = (int) $post_id;
$comment->published = 0;
if ($comment->save())
{
    return Redirect::back()
                    ->with('message', 'Commentaire envoyé, validation en attente.');
} else
{
    return Redirect::back()
                    ->with('error', 'Information manquante')
                    ->withInput();
}
}]);



