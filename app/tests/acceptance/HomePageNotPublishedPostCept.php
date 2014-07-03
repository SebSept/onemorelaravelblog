<?php
$I = new WebGuy($scenario);
$I->wantTo('Not published post does not appears on home');

// just to be sure that the item is not published but visible on another page.
Config::set('blog.posts_per_page', 2000);

$I->amOnPage('/');
$I->dontSee('Quo eos natus unde cum occaecati.');

