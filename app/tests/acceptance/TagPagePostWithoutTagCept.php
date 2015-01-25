<?php
use Laracasts\TestDummy\Factory;

$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);
$tags =  Factory::times(2)->create('SebSept\OMLB\Models\Tag\Tag');
$post->tags()->attach($tags[0]);

$I = new WebGuy($scenario);
$I->wantTo('Post without specified tag appears on another tag page');
$I->amOnPage('tag/'.$tags[1]->title);

$I->dontSee($post->title);
