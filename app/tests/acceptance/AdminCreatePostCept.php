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
    'content' => '#This is content',
    'hidden-tags' =>  Tag::all()->get(0)->title.','.
                    Tag::all()->get(1)->title.','.
                    Tag::all()->get(3)->title.','. 
                    'newone'
]);

$I->see(trans('admin.post.saved'));
