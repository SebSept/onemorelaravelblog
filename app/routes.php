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
\Route::group(['prefix' => 'admin', 'before' => 'auth.basic'], function()
{
    \Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'SebSept\OMLB\Controllers\Post@dashboard']);

    \Route::group(['prefix' => 'post'], function() { 
        \Route::get('/edit/{id?}',              ['as' => 'admin.post.edit',             'uses' => 'SebSept\OMLB\Controllers\Post@edit']);
        \Route::post('/edit/{id?}',             ['as' => 'admin.post.update',           'uses' => 'SebSept\OMLB\Controllers\Post@update']);
        \Route::get('/togglePublished/{id}',    ['as' => 'admin.post.togglePublished',  'uses' => 'SebSept\OMLB\Controllers\Post@togglePublished']);
        \Route::post('/delete/{id}',            ['as' => 'admin.post.destroy',           'uses' => 'SebSept\OMLB\Controllers\Post@destroy']);
        \Route::get('/preview/{slug}',          ['as' => 'admin.post.preview', 'uses' => 'SebSept\OMLB\Controllers\Post@preview']);
    });

    \Route::group(['prefix' => 'comment'], function()
    {
        \Route::get('/moderate',                ['as' => 'admin.comment.moderate',  'uses' => 'SebSept\OMLB\Controllers\Post@indexUnmoderatedComments']);
        \Route::get('/approuve/{comment_id}',   ['as' => 'admin.comment.approuve',  'uses' => 'SebSept\OMLB\Controllers\Post@approveComment']);
        \Route::get('/delete/{comment_id}',     ['as' => 'admin.comment.destroy',    'uses' => 'SebSept\OMLB\Controllers\Post@deleteComment']);
    });

    \Route::group(['prefix' => 'cache'], function()
    {
        \Route::get('flush', ['as' => 'admin.cache.flush', 'uses' => 'SebSept\OMLB\Controllers\Post@flushCache']);
    });
});


/**
 * Front office routes
 * */
// cached routes
\Route::group(['before' => 'cache_retrieve', 'after' => 'cache_create'], function()
{
    \Route::get('/', ['as' => 'post.index', 'uses' => 'SebSept\OMLB\Controllers\Post@index']);
    \Route::get('/tag/{tag}', ['as' => 'post.index.bytag', 'uses' => 'SebSept\OMLB\Controllers\Post@indexByTag']);
    \Route::get('/{slug}', ['as' => 'post.show', 'uses' => 'SebSept\OMLB\Controllers\Post@show']);
});

// comment posting
\Route::post('/comment/add/{post_id}', ['as' => 'comment.add', 'uses' => 'SebSept\OMLB\Controllers\Post@postComment']);

// 404
App::missing(function(\Exception $exception)
{
    Log::notice('404 - Handled : '.\Request::fullUrl());
    return \Response::view('404', array(), 404);
});
