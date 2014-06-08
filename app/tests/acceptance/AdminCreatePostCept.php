<?php
Route::enableFilters();
$I = new WebGuy($scenario);
$I->wantTo('Create a new post');

$I->amHttpAuthenticated('testguy', 'pass');
$I->amOnPage('/admin/post/edit');

$I->submitForm('form', [
    'title' => 'My new post',
    'slug' => 'my-new-post',
    'teaser' => 'The post summary.',
    'content', '#This is content',
]);

$I->see(trans('admin.post.saved'));



