<?php
use Laracasts\TestDummy\Factory;

$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);
$tag =  Factory::create('SebSept\OMLB\Models\Tag\Tag');
$post->tags()->attach($tag);

$I = new WebGuy($scenario);
$I->wantTo('Post with specified tag appears on tag page');
$I->amOnPage('tag/'.$tag->title);
$I->see($post->title);
