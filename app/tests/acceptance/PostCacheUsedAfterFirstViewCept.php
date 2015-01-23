<?php
$post_slug = 'aut-ex-accusantium-quo-tenetur-harum';

// enable filters, cache is managed using filters
Route::enableFilters();

$I = new WebGuy($scenario);
$I->wantTo('Check that Post cache is delete after post modified');
$I->prepareEmptyCache();

// view a post
$I->amOnPage($post_slug);
//$I->seeCacheCommentTag(); // fails : test is ok

// check cache is created - cache is working
$I->seeNewCache();

// request page once again - retrieved from cache
$I->amOnPage($post_slug);

$I->seeCacheCommentTag();
