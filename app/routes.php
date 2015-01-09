<?php
/**
 * Application Routes
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

use \SebSept\OMLB\Models\Post\Factory As PostRepositoryFactory;
use \SebSept\OMLB\Models\Comment\Factory As CommentRepositoryFactory;

/**
 * Backoffice routes
 * */
\Route::group(['prefix' => 'admin',  'before' => 'auth.basic'], function() {
    
    \Route::get('/', ['as' => 'admin.dashboard', function() {
        $posts = PostRepositoryFactory::make()->getAll('admin');
        $unpublished_comments_count = CommentRepositoryFactory::make()->count();
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
                    return Redirect::route('admin.dashboard')->with('message', trans('admin.post.saved'));
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
		    $unpublished_comments = CommentRepositoryFactory::make()->getUnmoderated();
		    return View::make(\Config::get('blog.theme').'::admin.comment_moderate', compact('unpublished_comments'));
		}]);

	    \Route::get('/approuve/{comment_id}', ['as' => 'admin.comment.approuve', function($comment_id) {
		    $comment = CommentRepositoryFactory::make()->getById($comment_id);
		    if ($comment && $comment->approve())
		    {
		        return Redirect::back()->with('message', trans('admin.comment.approved') );
		    }
		    return Redirect::back()->with('error', trans('admin.comment.approved_failled') );
		}]);

	    \Route::get('/delete/{comment_id}', ['as' => 'admin.comment.delete', function($comment_id) {
	        $comment = CommentRepositoryFactory::make()->getById($comment_id);
	        if ($comment->delete())
	        {
	            return Redirect::back()->with('message', trans('admin.comment.deleted'));
	        }
	    }]);
	});
        
    \Route::group(['prefix' => 'cache'], function() {
    
        \Route::get('flush', ['as' => 'admin.cache.flush', function() {
            BlogCacheManager::flush();
            return Redirect::back()->with('message', trans('admin.cache.flushed'));
        }]);
    });
});


/**
 * Front office routes
 * */

// cached routes
\Route::group(['before' => 'cache_retrieve', 'after' => 'cache_create'], function() {
    \Route::get('/',            ['as' => 'post.index',        'uses' => 'SebSept\OMLB\Controllers\Post@index' ]);
    \Route::get('/tag/{tag}',   ['as' => 'post.index.bytag',  'uses' => 'SebSept\OMLB\Controllers\Post@indexByTag' ]); 
    \Route::get('/{slug}',      ['as' => 'post.show',         'uses' => 'SebSept\OMLB\Controllers\Post@show' ]);
});

// comment posting
\Route::post('/comment/add/{post_id}', ['as' => 'comment.add', 'uses' => 'SebSept\OMLB\Controllers\Post@postComment']);

// 404
App::missing(function($exception)
{
    return Response::view(\Config::get('blog.theme').'::404', array(), 404);
});
