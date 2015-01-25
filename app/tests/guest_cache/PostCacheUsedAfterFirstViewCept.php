<?php
use Laracasts\TestDummy\Factory;

$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);

// enable filters, cache is managed using filters
Route::enableFilters();

$I = new GuestCache($scenario);
$I->wantTo('Check that Post cache is used after post not modified');
//$I->prepareEmptyCache();

// view a post
$I->amOnPostPage($post);

// check cache is created - cache is working
$I->seeSomeCache();

// request page once again - retrieved from cache
$I->amOnPostPage($post);

$I->seeCacheCommentTag();
