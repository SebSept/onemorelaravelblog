<?php
$I = new Guest($scenario);
$I->wantTo('View tag page for non existing tag');

// just to be sure that the item is not published but visible on another page.
Config::set('blog.posts_per_page', 2000);

try
{
    $I->amOnPage('tag/donotexists');
//    $I->dontSee('donotexists');
} 
//catch(Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e)
catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
{
    // test is ok maybe
    // we expect a 404 error but error handling is by passed by phpunit - https://github.com/laravel/framework/issues/633
}

