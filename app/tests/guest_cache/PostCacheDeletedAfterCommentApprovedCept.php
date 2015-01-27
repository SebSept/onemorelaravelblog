<?php
use Laracasts\TestDummy\Factory;

// enable filters, cache is managed using filters
Route::enableFilters();

// prepare data
$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);
$comment = Factory::create('SebSept\OMLB\Models\Comment\Comment', ['slug' => 'my-post', 'published' => 0, 'post_id' => $post->id]);

// prepare test
$I = new GuestCache($scenario);
$I->wantTo('Check that Post cache is delete after a post comment was approved.');

// run test

// view a post
$I->amOnPostPage($post);
//$I->contentIsNotFromCache();

// approve comment : cache deleted
$comment->approve();

// view the post again
$I->amOnPostPage($post);
$I->contentIsNotFromCache();
