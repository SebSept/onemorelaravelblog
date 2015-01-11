<?php
use \SebSept\OMLB\Models\Comment\Comment;
DB::beginTransaction();
Route::enableFilters();

$I = new WebGuy($scenario);
$I->wantTo('delete a comment');

$I->amHttpAuthenticated('testguy', 'pass');

// comment to moderate listed
$I->amOnPage('/admin/comment/moderate');
$I->see('Exercitationem voluptas ducimus quas modi.'); // comment 7

$I->click('#delete_7');
$I->see(trans('admin.comment.destroyed'));

// comment 7 is not to moderate anymore
$I->seeInCurrentUrl('/admin/comment/moderate');
$I->dontSee('Exercitationem voluptas ducimus quas modi.'); // comment 7

// neither published on post page (post->id = 5)
$I->amOnPage('/sit-et-sunt-dolorem-suscipit-vel-labore');
$I->dontSee('Exercitationem voluptas ducimus quas modi.');

DB::rollBack();
