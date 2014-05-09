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
	Route::get('/', function() {
		return View::make('admin.dashboard');
	});

});

Route::get('/', function()
{
	$page = Input::get('page') ? (string)Input::get('page') : '1';

	return Cache::rememberForever('home_'.$page, function() use ($page) {
		Log::info('Mise en cache : Accueil : '. $page );
		$posts = Post::wherePublished('1')->paginate(5);
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

