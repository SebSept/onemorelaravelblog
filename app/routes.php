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
**/
Route::group(['prefix'=> 'admin', 'before'=> 'auth.basic'], function() {

	Route::get('/', ['as' => 'admin.dashboard', function() {
		$posts = Post::orderBy('created_at')->paginate(25);
		return View::make('admin.dashboard', compact('posts'))->render();
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
		// $_POST['published'] = Input::get('published') ? 1 : 0;
		// var_dump($_POST);
		$inputs = Input::only(['title', 'slug', 'teaser', 'content', 'published']);
		$inputs['published'] = is_null($inputs['published']) ? 0 : 1;
		// $inputs = Input::all();
// dd($inputs);
		if( $post->update($inputs) ) {
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
		$post = Post::whereId($id)->first();
		return View::make('admin.delete', compact('post'))->render();
	}]);

});


/**
* Front office routes
**/
Route::get('/', function()
{
	$page = Input::get('page') ? (string)Input::get('page') : '1';

	return Cache::rememberForever('home_'.$page, function() use ($page) {
		Log::info('Mise en cache : Accueil : '. $page );
		$posts = Post::wherePublished('1')->orderBy('created_at')->paginate( Config::get('app.posts_per_page') );
		return View::make('home', compact('posts'))->render();
	});	
});


Route::get('/tag/{tag}', ['as' => 'tag.view', function($tag) 
{
	$page = Input::get('page') ? (string)Input::get('page') : '1';

	Log::info('Check cache : taglist_'.$tag.$page);

	return Cache::rememberForever('taglist_'.$tag.$page, function() use ($tag, $page) {
		$tag = Tag::whereTitle($tag)->first();
		if($tag) {
			$posts = Post::wherePublished('1')
					->with(['tags' => function($query) use ($tag) {
				$query->whereId($tag->id);
			}])
					->paginate( Config::get('app.posts_per_page') );
			$list_title = 'Posts with tag <em>'.$tag->title.'</em>';
			Log::info('Mise en cache : TagList : '. 'taglist_'.$tag->title.$page );
			return View::make('home', compact('posts', 'list_title'))->render();
		}
		app::abort(404);
	});
}]);

	});	
});

