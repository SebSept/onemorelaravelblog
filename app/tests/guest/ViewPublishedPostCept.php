<?php

use Laracasts\TestDummy\Factory;

$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);

$I = new Guest($scenario);
$I->wantTo('View published post');

$I = new Guest($scenario);
$I->wantTo('Published post can be viewed');
$I->amOnPostPage($post);
// post title
$I->see($post->title); 
