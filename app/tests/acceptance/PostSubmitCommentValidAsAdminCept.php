<?php
/**
 * @todo enable filter / check csrf
 * @todo check urls contains "#comment_submitted"
 */

$faker = Faker\Factory::create('fr_FR');
$submited_content = $faker->text;

DB::beginTransaction();

// we do not test csrf filter, we can rely on laravel
// just be sure, filter is set for the route
Route::disableFilters();

$I = new WebGuy($scenario);
$I->wantTo('submit valid comment as admin');
$I->amAdmin();
//$I->amHttpAuthenticated('testguy', 'pass');

// step 1 : submit comment
$I->amOnPage('aut-ex-accusantium-quo-tenetur-harum');

$I->submitForm( '#post-form form', [  'title'=> 'my comment title' ,
                                'author_name' => 'Jacky kio',
                                'author_site' => 'http://google.fr',
                                'content' => $submited_content,
//                                '_token' => $I->grabValueFrom('input[name="_token"]')
        ]);

// step 2 : check comment is published
$I->see($submited_content);

DB::rollBack();