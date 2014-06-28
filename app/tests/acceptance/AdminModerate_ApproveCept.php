<?php
use \SebSept\OMLB\Models\Comment\Comment;
DB::beginTransaction();
Route::enableFilters();

$I = new WebGuy($scenario);
$I->wantTo('Approve a comment');

$I->amHttpAuthenticated('testguy', 'pass');

// comment to moderate listed
$I->amOnPage('/admin/comment/moderate');
$I->see('Exercitationem voluptas ducimus quas modi.'); // comment 7

$I->click('#approve_7');
$I->see(trans('admin.comment.approved'));
$I->dontSee(trans('admin.comment.approved_failled'));

// comment 7 is not to moderate anymore
$I->seeInCurrentUrl('/admin/comment/moderate');
$I->dontSee('Exercitationem voluptas ducimus quas modi.'); // comment 7

DB::rollBack();
