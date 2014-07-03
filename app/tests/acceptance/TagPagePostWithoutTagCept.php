<?php
$I = new WebGuy($scenario);
$I->wantTo('Post with specified tag does not appears on tag page');

// just to be sure that the item is not published but visible on another page.
Config::set('blog.posts_per_page', 2000);

$I->amOnPage('tag/accusamus'); // tag->id = 2
$I->dontSee('Qui amet ipsum sunt.');
