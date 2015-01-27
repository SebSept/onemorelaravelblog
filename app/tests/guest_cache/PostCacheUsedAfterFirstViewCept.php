<?php
use Laracasts\TestDummy\Factory;

// prepare existing post
$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);

// enable filters, cache is managed using filters
Route::enableFilters();

$I = new GuestCache($scenario);
$I->wantTo('Check that Post cache is used after post not modified');

// view a post : cache created
$I->amOnPostPage($post);

// request page once again : retrieved from cache
$I->amOnPostPage($post);
$I->contentIsFromCache();
