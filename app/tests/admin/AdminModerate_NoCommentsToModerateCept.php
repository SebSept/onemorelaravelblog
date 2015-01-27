<?php
$I = new Admin($scenario);
$I->amAdmin();

$I->wantTo('See comments to moderate list - without comments');

$I->amOnPage('/admin/comment/moderate');

$I->see(trans('admin.comment.moderate'));

