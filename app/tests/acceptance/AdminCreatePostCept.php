<?php
Route::enableFilters();
$I = new WebGuy($scenario);
$I->wantTo('Create a new post');

$I->amHttpAuthenticated('testguy', 'pass');
$I->amOnPage('/admin/post/edit');
$I->fillField('title', 'My new post');
$I->fillField('slug', 'my-new-post');
$I->fillField('teaser', 'The post summary.');
$I->fillField('content', '#This is content');
$I->submitForm('form', []);

$I->see(trans('admin.post.saved'));



