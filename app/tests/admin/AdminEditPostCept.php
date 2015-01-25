<?php
use SebSept\OMLB\Models\Tag\Tag;
use SebSept\OMLB\Models\Post\Post;
use Laracasts\TestDummy\Factory;



// prepare existing tags
Factory::times(4)->create('SebSept\OMLB\Models\Tag\Tag');
// & post
$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['title' => 'orginal title']);

$I = new Admin($scenario);
$I->wantTo('Edit a post');
$I->amAdmin();

$I->amOnPage('/admin/post/edit/'.$post->id);

// post title displayed (we are editing a post)
$current_title = $post->title;
$I->see($current_title);

// edit post & submit form
$new_title = $current_title.' MOD';
$I->submitForm('form', [
    'title' => $new_title,
    'slug' => $post->slug,
    'teaser' => 'The post summary.',
    'content' => '#This is content',
    'hidden-tags' =>  Tag::all()->get(0)->title.','.
                    Tag::all()->get(1)->title.','.
                    Tag::all()->get(3)->title.','. 
                    'newone'
]);

// back on posts list
$I->see(trans('admin.post.saved'));
// new title for post, in listed posts
$I->see($new_title);
