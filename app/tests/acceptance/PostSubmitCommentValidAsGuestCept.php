<?php
/**
 * @todo check urls contains "#comment_submitted"
 */
use Laracasts\TestDummy\Factory;

$post = Factory::create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);
$comment_content = Faker\Factory::create('fr_FR')->text;

$I = new WebGuy($scenario);
$I->wantTo('submit valid comment as guest');
$I->amGuest();

// submit comment
$I->amOnPostPage($post);

$I->submitForm( '#post-form form', [  
                                'title'=> 'my comment title' ,
                                'author_name' => 'Jacky kio',
                                'author_site' => 'http://google.fr',
                                'content' => $comment_content,
        ]);

// check comment is published
$I->dontSee($comment_content);
