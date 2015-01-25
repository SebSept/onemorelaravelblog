<?php
use Laracasts\TestDummy\Factory;

Factory::times(5)->create('SebSept\OMLB\Models\Comment\Comment');

$I = new Admin($scenario);
$I->wantTo('See comments to moderate list - with comments');
$I->amAdmin();

$I->amOnPage('/admin/comment/moderate');
$I->see(trans('admin.comment.moderate'));
