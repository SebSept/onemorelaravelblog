<?php
use Laracasts\TestDummy\Factory;

$posts = Factory::times(3)->create('SebSept\OMLB\Models\Post\Post', ['published' => 1]);

$I = new Guest($scenario);
$I->wantTo('Published post appears on home');
$I->amOnPage('/');
foreach($posts as $post)
{
    $I->see($post->title);
}