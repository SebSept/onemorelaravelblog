<?php
use Laracasts\TestDummy\Factory;

$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);

// enable filters, cache is managed using filters
Route::enableFilters();

$I = new Guest($scenario);
$I->wantTo('Check that Post cache is delete after post modified');
//$I->prepareEmptyCache();

// view a post
$I->amOnPostPage($post);

// check cache is created - cache is working
$I->seeNewCache();

// request page once again - retrieved from cache
$I->amOnPostPage($post);

$I->seeCacheCommentTag();
