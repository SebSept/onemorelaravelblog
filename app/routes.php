<?php

/*
  |--------------------------------------------------------------------------
  | Application \Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

use OMLB\Models\Post\Repository\PostRepositoryFactory;
use OMLB\Models\Comment\Comment;

/**
 * Backoffice routes
 * */
\Route::group(['prefix' => 'admin',  'before' => 'auth.basic'], function() {
    
    \Route::get('/', ['as' => 'admin.dashboard', function() {
        $posts = PostRepositoryFactory::make()->getAll('admin');
        $unpublished_comments_count = Comment::wherePublished('0')->count();
        return View::make(\Config::get('blog.theme').'::admin.dashboard', compact('posts', 'unpublished_comments_count'));
    }]);
    
    \Route::group(['prefix' => 'post'], function() { 
	    // edit/post
	    // edit
	    \Route::get('/edit/{id?}', ['as' => 'admin.post.edit', function($id = null) {
                $post = PostRepositoryFactory::make()->getByIdOrNew($id);            
                return View::make(\Config::get('blog.theme').'::admin.edit', compact('post'));
            }]);
            
	    // post
	    \Route::post('/edit/{id?}', ['as' => 'admin.post.submit', function($id = null) {
                $inputs = Input::only(['title', 'slug', 'teaser', 'content', 'published', 'hidden-tags']);

                if(PostRepositoryFactory::make()->save($id, $inputs))
                {
                    return Redirect::route('admin.dashboard')->with('message', Lang::get('admin.post.saved'));
                }
                return Redirect::back()->withInput()->withErrors(Session::get('errors'));
            }]);

	    \Route::get('/togglePublished/{id}', ['as' => 'admin.post.togglePublished', function($id) {
                $post = PostRepositoryFactory::make()->getById($id);
                $post->published = abs($post->published - 1);
                $post->save();
                return Redirect::back()->with('message', $post->published ? 'published' : 'unpublished');
            }]);

	    \Route::post('/delete/{id}', ['as' => 'admin.post.delete', function($id) {
                if(PostRepositoryFactory::make()->getById($id)->delete())    {
                    return Redirect::back()->with('message', trans('admin.post.deleted'));
                }
                return Redirect::back()->with('message', trans('admin.post.deletion_failled'));
            }]);

	    \Route::get('/preview/{slug}', ['as' => 'admin.post.preview',  function($slug) {
	        $post = PostRepositoryFactory::make()->getBySlug($slug);
	        if ($post)
	        {
	            return View::make(\Config::get('blog.theme').'::post', compact('post'));
	        }
	        app::abort(404);
	    }]);
	});

    \Route::group(['prefix' => 'comment'], function() {

	    \Route::get('/moderate', ['as' => 'admin.comment.moderate', function() {
		    $unpublished_comments = Comment::wherePublished('0')->paginate(\Config::get('blog.comments_per_page_admin', 20));
		    return View::make(\Config::get('blog.theme').'::admin.comment_moderate', compact('unpublished_comments'));
		}]);

	    \Route::get('/approuve/{comment_id}', ['as' => 'admin.comment.approuve', function($comment_id) {
		    $comment = Comment::whereId($comment_id)->first();
		    if ($comment->approve())
		    {
		        return Redirect::back()->with('message', 'admin.comment.approved');
		    }
		    return Redirect::back()->with('error', 'admin.comment.approved_failled');
		}]);

	    \Route::get('/delete/{comment_id}', ['as' => 'admin.comment.delete', function($comment_id) {
	        $comment = Comment::whereId($comment_id)->first();
	        if ($comment->delete())
	        {
	            return Redirect::back()->with('message', 'admin.comment.deleted');
	        }
	    }]);
	});
        
    \Route::group(['prefix' => 'cache'], function() {
    
        \Route::get('flush', ['as' => 'admin.cache.flush', function() {
            BlogCacheManager::flush();
            return Redirect::back()->with('message', Lang::get('admin.cache.flushed'));
        }]);
    });
});


/**
 * Front office routes
 * */
\Route::group(['before' => 'cache_retrieve', 'after' => 'cache_create'], function() {
    \Route::get('/', ['as' => 'home', function() {
        $posts = PostRepositoryFactory::make()->getAll();
        return View::make(\Config::get('blog.theme').'::home', compact('posts'))->render();
    }
    ]);

    \Route::get('/tag/{tag}', ['as' => 'tag.view', function($tag) {
        if ($posts = PostRepositoryFactory::make()->getByTagName($tag)) {
            $list_title = Lang::get('front.list.header.posts tagged' , ['title' => $tag]);
            return View::make(\Config::get('blog.theme').'::home', compact('posts', 'list_title'))->render();
        }
        app::abort(404);
}]);

    \Route::get('/{slug}', ['as' => 'post.view', function($slug) {
        if ($post = PostRepositoryFactory::make()->getBySlug($slug))
        {
            return View::make(\Config::get('blog.theme').'::post', compact('post'))->render();
        }
        app::abort(404);
    }
    ]);
});

\Route::post('/comment/add/{post_id}', ['as' => 'comment.add', 'before' => 'csrf', function($post_id) {
	$comment = new Comment(Input::only(['title', 'author_name', 'author_site', 'content']));
	$comment->post_id = (int) $post_id;
        $comment->is_admin = (int) Auth::check();
        if($comment->is_admin) {
            $comment->published = 1;
        }
	if ($comment->save())
	{
	    return Redirect::back()
	                    ->with('message', 'front.comment.submited');
	} else
	{
	    return Redirect::back()
	                    ->with('error', 'front.comment.submission_failled')
	                    ->withInput();
	}
}]);

// 404
App::missing(function($exception)
{
    return Response::view(\Config::get('blog.theme').'::404', array(), 404);
});