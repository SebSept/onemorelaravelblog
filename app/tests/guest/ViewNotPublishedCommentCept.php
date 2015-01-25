<?php

use Laracasts\TestDummy\Factory;

$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);
$comment = Factory::create('SebSept\OMLB\Models\Comment\Comment', ['published' => 0, 'post_id' => $post->id]);

$I = new Guest($scenario);
$I->wantTo('not see unpublished comment');
//$I->amOnPostPage($post);
$I->amOnPostPage($post);

// post published but not comment
$I->see($post->title); 
$I->dontSee($comment->title); 


