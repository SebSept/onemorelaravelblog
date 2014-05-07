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

Route::get('/', function()
{
	// $posts = Post::where('published' , '=', '1')->paginate(5);
	$posts = Post::wherePublished('1')->paginate(5);
	// dd($posts->first()->getAttributes());
	return View::make('home', compact('posts'));
});

Route::get('/{slug}', function($slug)
{
	// $posts = Post::where('published' , '=', '1')->paginate(5);
	$post = Post::whereSlug($slug)->firstOrFail();
	return View::make('post', compact('post'));
});
