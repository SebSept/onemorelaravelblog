<?php
use OMLB\Models\Comment\Comment;

Route::enableFilters();
$I = new WebGuy($scenario);
//DB::update('UPDATE '.(new Comment)->getTable().' SET `published`=1');
$I->wantTo('Approve a comment');

$I->amHttpAuthenticated('testguy', 'pass');

// comment to moderate listed
$I->amOnPage('/admin/comment/moderate');
$I->see('Exercitationem voluptas ducimus quas modi.'); // comment 7

$I->click('#approve_7');
$I->see(trans('admin.comment.approved'));
$I->dontSee(trans('admin.comment.approved_failled'));

// comment 7 is not to moderate anymore
$I->dontSee('Exercitationem voluptas ducimus quas modi.'); // comment 7
