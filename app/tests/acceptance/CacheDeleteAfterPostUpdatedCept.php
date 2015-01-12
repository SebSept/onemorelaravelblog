<?php
$post_slug = 'aut-ex-accusantium-quo-tenetur-harum';

// enable filters, cache is managed using filters
Route::enableFilters();

$I = new WebGuy($scenario);
$I->wantTo('Check that Post cache is delete after post modified');
//$I->prepareEmptyCache();

// view a post
$I->amOnPage($post_slug);

// check cache is created
$I->seeNewCache();

// update post
SebSept\OMLB\Models\Post\Factory::make('front')->getBySlug($post_slug)->save();

$I->seeEmptyCacheDir();

