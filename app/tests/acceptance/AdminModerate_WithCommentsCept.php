<?php
use \SebSept\OMLB\Models\Comment\Comment;

Route::enableFilters();
$I = new WebGuy($scenario);
$I->wantTo('Be on comment list (admin) - with comments');

$I->amHttpAuthenticated('testguy', 'pass');
$I->amOnPage('/admin/comment/moderate');

$I->see(trans('admin.comment.moderate'));
