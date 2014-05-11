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


Route::group(['prefix'=> 'admin', 'before'=> 'auth.basic'], function() {

	Route::get('/', ['as' => 'admin.dashboard', function() {
		$posts = Post::orderBy('created_at')->paginate(25);
		return View::make('admin.dashboard', compact('posts'))->render();
	}]);

	// edit/post
	Route::get('/edit/{id}', ['as' => 'admin.edit', function($id) {
		$post = Post::find($id)->first();
		return View::make('admin.edit', compact('post'))->render();
	}]);

	Route::post('/edit', ['as' => 'admin.post', function() {
		$post = Post::find(Input::get('id'))->first();
		$inputs = Input::only(['title', 'slug', 'teaser', 'content', 'published']);
		if( $post->update($inputs) ) {
			return Redirect::route('admin.dashboard')->with('message', 'Enregistré.');
		}
		return Redirect::back()->withInput();
		// $post = Post::find($id)->first();
		// return View::make('admin.edit', compact('post'))->render();
	}]);


	Route::get('/togglePublished/{id}', ['as' => 'admin.togglePublished', function($id) {
		$post = Post::find($id)->first();
		return View::make('admin.togglePublished', compact('post'))->render();
	}]);

	Route::get('/delete/{id}', ['as' => 'admin.delete', function($id) {
		$post = Post::find($id)->first();
		return View::make('admin.delete', compact('post'))->render();
	}]);

});

Route::get('/', function()
{
	$page = Input::get('page') ? (string)Input::get('page') : '1';

	return Cache::rememberForever('home_'.$page, function() use ($page) {
		Log::info('Mise en cache : Accueil : '. $page );
		$posts = Post::wherePublished('1')->orderBy('created_at')->paginate(5);
		return View::make('home', compact('posts'))->render();
	});	
});

Route::get('/{slug}', function($slug)
{
	return Cache::rememberForever('post_'.$slug, function() use ($slug) {
		// $slug = Input::get('slug');
		$post = Post::whereSlug($slug)->wherePublished('1')->first();
		if($post) {
			Log::info('Mise en cache : Post : '. $slug );
			return View::make('post', compact('post'))->render();	
		}
		app::abort(404);
	});	
});

