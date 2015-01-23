<?php
use Laracasts\TestDummy\Factory;

// enable filters, cache is managed using filters
Route::enableFilters();

// prepare data
$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);
$comment = Factory::create('SebSept\OMLB\Models\Comment\Comment', ['slug' => 'my-post', 'published' => 0, 'post_id' => $post->id]);



$I = new WebGuy($scenario);
$I->wantTo('Check that Post cache is delete after a post comment was approved.');

// cache must be empty on start
$I->seeEmptyCacheDir();

// view a post
$I->amOnPage($post->slug);

// check cache is created
$I->seeNewCache();

// approve comment
$comment->approve();

// cache should be deleted
$I->seeEmptyCacheDir();
