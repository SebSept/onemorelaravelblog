<?php
use SebSept\OMLB\Models\Comment\Comment;
use Laracasts\TestDummy\Factory;

// prepare data
$post = Factory::create('SebSept\OMLB\Models\Post\Post');
$comment = Laracasts\TestDummy\Factory::create('SebSept\OMLB\Models\Comment\Comment', ['post_id' => $post->id]);

$I = new WebGuy($scenario);
$I->wantTo('Approve a comment');
$I->amAdmin();

// comment to moderate listed
$I->amOnPage('/admin/comment/moderate');
$I->see($comment->title);

$I->click('#approve_'.$comment->id);
$I->see(trans('admin.comment.approved'));
$I->dontSee(trans('admin.comment.approved_failled'));

// comment is not to moderate anymore
$I->seeInCurrentUrl('/admin/comment/moderate');
$I->dontSee($comment->title); 


