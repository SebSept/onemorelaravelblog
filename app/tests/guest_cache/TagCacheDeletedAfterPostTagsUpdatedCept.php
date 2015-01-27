<?php
use Laracasts\TestDummy\Factory;

// prepare existing post
$tags = Factory::times(5)->create('SebSept\OMLB\Models\Tag\Tag');
$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);
$post->tags()->attach($tags[0]);
$post->tags()->attach($tags[1]);

// enable filters, cache is managed using filters
Route::enableFilters();

// init
$I = new GuestCache($scenario);
$I->wantTo('Check that Tag cache is delete after post modified');

// --- test 1 : tag page cache deleted : tag removed from post

// view a tag
$I->amOnTagPage($tags[0]);

// update post tags
$tags_str = $tags[1]->title.','.$tags[2]->title;
SebSept\OMLB\Models\Post\Factory::make('admin')->setTagsFromString($tags_str, $post);

$I->amOnTagPage($tags[0]);
$I->contentIsNotFromCache();

// --- test 2 : tag page cache deleted : tag added to post
$I->prepareEmptyCache();

// see a page with other posts
$I->amOnTagPage($tags[3]);

// save the post with a new tag
$tags_str = $tags[1]->title.','.$tags[3]->title;
SebSept\OMLB\Models\Post\Factory::make('admin')->setTagsFromString($tags_str, $post);

$I->amOnTagPage($tags[3]);
$I->contentIsNotFromCache();

// --- test 3 : tag page cache not deleted : tag nor removed neither added
$I->prepareEmptyCache();

// see a page with other posts
$I->amOnTagPage($tags[4]);

// save the post with a new tag
$tags_str = $tags[1]->title.','.$tags[3]->title;
SebSept\OMLB\Models\Post\Factory::make('admin')->setTagsFromString($tags_str, $post);

$I->amOnTagPage($tags[4]);
$I->contentIsFromCache();
