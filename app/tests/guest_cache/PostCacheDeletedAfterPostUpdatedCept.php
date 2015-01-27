<?php
use Laracasts\TestDummy\Factory;

// prepare existing post
$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);

// enable filters, cache is managed using filters
Route::enableFilters();

$I = new GuestCache($scenario);
$I->wantTo('Check that Post cache is delete after post modified');

// view a post
$I->amOnPostPage($post);

// update post : cache deleted
SebSept\OMLB\Models\Post\Factory::make('front')->getBySlug($post->slug)->save();

$I->amOnPostPage($post);
$I->contentIsNotFromCache();

