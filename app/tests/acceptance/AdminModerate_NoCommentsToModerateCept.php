<?php
use OMLB\Models\Comment\Comment;

Route::enableFilters();
$I = new WebGuy($scenario);
//DB::update('UPDATE '.(new Comment)->getTable().' SET `published`=1');
DB::delete('DELETE FROM '.(new Comment)->getTable());
$I->wantTo('Be on comment list (admin) - without comments');

$I->amHttpAuthenticated('testguy', 'pass');
$I->amOnPage('/admin/comment/moderate');

$I->see(trans('admin.comment.moderate'));