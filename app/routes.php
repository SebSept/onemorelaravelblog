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
Route::group(['prefix' => 'admin',  'before' => 'auth.basic'], function() {
    
    Route::get('/', ['as' => 'admin.dashboard', function() {
        $posts = PostRepository::getAll('admin');
        $unpublished_comments_count = Comment::wherePublished('0')->count();
        return View::make(Config::get('blog.theme').'::admin.dashboard', compact('posts', 'unpublished_comments_count'));
    }]);
    
    Route::group(['prefix' => 'post'], function() { 
	    // edit/post
	    // edit
	    Route::get('/edit/{id?}', ['as' => 'admin.post.edit', function($id = null) {
                $post = PostRepository::getByIdOrCreate($id);            
                return View::make(Config::get('blog.theme').'::admin.edit', compact('post'));
            }]);
            
	    // post
	    Route::post('/edit/{id?}', ['as' => 'admin.post.submit', function($id = null) {
                $post = PostRepository::getByIdOrCreate($id);
                
                // @todo : next lines must be in PostRepo or Post (?)
                $inputs = Input::only(['title', 'slug', 'teaser', 'content', 'published']);
                $inputs['published'] = is_null($inputs['published']) ? 0 : 1;
                
                $post->fill($inputs);
                if($post->save())
                {
                    $post->setTagsFromString(Input::get('hidden-tags'));
                    return Redirect::route('admin.dashboard')->with('message', 'Enregistré.');
                }
                return Redirect::back()->withInput();
            }]);

	    Route::get('/togglePublished/{id}', ['as' => 'admin.post.togglePublished', function($id) {
                $post = PostRepository::getById($id);
                $post->published = abs($post->published - 1);
                $post->save();
                return Redirect::back()->with('message', $post->published ? 'published' : 'unpublished');
            }]);

	    Route::post('/delete/{id}', ['as' => 'admin.post.delete', function($id) {
                if(PostRepository::getById($id)->delete())    {
                    return Redirect::back()->with('message', 'Suppression réussie');
                }
                return Redirect::back()->with('message', 'Suppression ratée');
            }]);

	    Route::get('/preview/{slug}', ['as' => 'admin.post.preview',  function($slug) {
	        $post = PostRepository::getBySlug($slug);
	        if ($post)
	        {
	            return View::make(Config::get('blog.theme').'::post', compact('post'));
	        }
	        app::abort(404);
	    }]);
	});

    Route::group(['prefix' => 'comment'], function() {

	    Route::get('/moderate', ['as' => 'admin.comment.moderate', function() {
		    $unpublished_comments = Comment::wherePublished('0')->paginate(Config::get('blog.comments_per_page_admin', 20));
		    return View::make(Config::get('blog.theme').'::admin.comment_moderate', compact('unpublished_comments'));
		}]);

	    Route::get('/approuve/{comment_id}', ['as' => 'admin.comment.approuve', function($comment_id) {
		    $comment = Comment::whereId($comment_id)->first();
		    if ($comment->approve())
		    {
		        return Redirect::back()->with('message', 'Commentaire approuvé');
		    }
		    return Redirect::back()->with('error', 'Echec approbation commentaire !');
		}]);

	    Route::get('/delete/{comment_id}', ['as' => 'admin.comment.delete', function($comment_id) {
	        $comment = Comment::whereId($comment_id)->first();
	        if ($comment->delete())
	        {
	            return Redirect::back()->with('message', 'Commentaire supprimé.');
	        }
	    }]);
	});
});


/**
 * Front office routes
 * */
Route::group(['before' => 'cache_retrieve', 'after' => 'cache_create'], function() {
    Route::get('/', ['as' => 'home', function() {
        $posts = PostRepository::getAll();
        return View::make(Config::get('blog.theme').'::home', compact('posts'))->render();
    }
    ]);

    Route::get('/tag/{tag}', ['as' => 'tag.view', function($tag) {
        if ($posts = PostRepository::getByTagName($tag)) {
            $list_title = Lang::get('front.list.header.posts tagged' , ['title' => $tag]);
            return View::make(Config::get('blog.theme').'::home', compact('posts', 'list_title'))->render();
        }
        app::abort(404);
}]);

    Route::get('/{slug}', ['as' => 'post.view', function($slug) {
        if ($post = PostRepository::getBySlug($slug))
        {
            return View::make(Config::get('blog.theme').'::post', compact('post'))->render();
        }
        app::abort(404);
    }
    ]);
});

Route::post('/comment/add/{post_id}', ['as' => 'comment.add', function($post_id) {
	$comment = new Comment(Input::only(['title', 'author_name', 'author_site', 'content']));
	$comment->post_id = (int) $post_id;
        $comment->is_admin = (int) Auth::check();
        if($comment->is_admin) {
            $comment->published = 1;
        }
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

// 404
App::missing(function($exception)
{
    return Response::view('404', array(), 404);
});