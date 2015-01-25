<?php

use Laracasts\TestDummy\Factory;

$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);
$comment = Factory::create('SebSept\OMLB\Models\Comment\Comment', ['published' => 1, 'post_id' => $post->id]);

$I = new Guest($scenario);
$I->wantTo('see published comment');


$I->amOnPostPage($post);

// post published but not comment
$I->see($post->title);
$I->see($comment->title);