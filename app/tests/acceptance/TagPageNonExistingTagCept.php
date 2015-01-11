<?php

$test_tag = 'non existing';

$I = new WebGuy($scenario);
$I->wantTo('View tag for non existing tag - not a real test');

$I->dontSeeRecord('tags', ['title' => $test_tag]);
// just to be sure that the item is not published but visible on another page.
Config::set('blog.posts_per_page', 2000);

try
{
    $I->amOnPage('tag/' . $test_tag); // tag->id = 2
    $I->dontSee($test_tag);
} 
//catch(Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e)
catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
{
    // test is ok maybe
    
    // we expect a 404 error but error handling is by passed by phpunit - https://github.com/laravel/framework/issues/633
    
}

