<?php
use \SebSept\OMLB\Models\Tag\Tag;
use \SebSept\OMLB\Models\Post\Post;

DB::beginTransaction();

Route::enableFilters();

$I = new WebGuy($scenario);
$I->wantTo('Edit a post');

$I->amHttpAuthenticated('testguy', 'pass');
$I->amOnPage('/admin/post/edit/6');

// post title displayed (we are editing a post)
$current_title = Post::find(6)->title;
$new_title = $current_title.' MOD';

$I->see($current_title);

$I->submitForm('form', [
    'title' => $new_title,
    'slug' => Post::find(6)->slug,
    'teaser' => 'The post summary.',
    'content' => '#This is content',
    'hidden-tags' =>  Tag::all()->get(0)->title.','.
                    Tag::all()->get(1)->title.','.
                    Tag::all()->get(3)->title.','. 
                    'newone'
]);

$I->see(trans('admin.post.saved'));
// new title for post, in listed posts
$I->see($new_title);

DB::rollBack();
