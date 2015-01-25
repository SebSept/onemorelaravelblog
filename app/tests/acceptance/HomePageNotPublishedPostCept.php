<?php
use Laracasts\TestDummy\Factory;

$posts = Factory::times(3)->create('SebSept\OMLB\Models\Post\Post', ['published' => 0]);

$I = new WebGuy($scenario);
$I->wantToTest('Not published post does not appears on home');

$I->amOnPage('/');
foreach($posts as $post)
{
    $I->dontSee($post->title);
}

