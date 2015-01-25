<?php
use SebSept\OMLB\Models\Comment\Comment;
use Laracasts\TestDummy\Factory;

// prepare data
$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);
$comment = Laracasts\TestDummy\Factory::create('SebSept\OMLB\Models\Comment\Comment', ['post_id' => $post->id]);

$I = new Admin($scenario);
$I->wantTo('delete a comment');
$I->amAdmin();

// comment to moderate listed
$I->amOnPage('/admin/comment/moderate');
$I->see($comment->title);

$I->click('#delete_'.$comment->id);
$I->see(trans('admin.comment.destroyed'));

$I->seeInCurrentUrl('/admin/comment/moderate');
$I->dontSee($comment->title);

// neither published on post page (post->id = 5)
$I->amOnPostPage($post);
$I->dontSee($comment->title);
