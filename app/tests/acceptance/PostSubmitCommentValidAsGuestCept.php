<?php
/**
 * @todo enable filter / check csrf
 * @todo check urls contains "#comment_submitted"
 */
DB::beginTransaction();

//Route::enableFilters();

$I = new WebGuy($scenario);
$I->wantTo('submit valid comment as guest');
$I->amOnPage('aut-ex-accusantium-quo-tenetur-harum');

echo  $I->grabValueFrom('input[name=_token]');
echo  $I->grabValueFrom('input[name=title]');

$I->submitForm( '#post-form form', [  'title'=> 'my comment title' ,
                                'author_name' => 'Jacky kio',
                                'author_site' => 'http://google.fr',
                                'content' => 'bla bla. Fake contetnt',
//                                '_token' => $I->grabValueFrom('input[name="_token"]')
        ]);
//$I->canSeeCurrentUrlEquals($uri)
//if($I->seeCurrentUrlEquals('/aut-ex-accusantium-quo-tenetur-harum?#comment_submitted')) {
//    echo 'oki';
//}
//else
//    echo 'notOki';

//echo $I->grabFromCurrentUrl('~/aut-ex-accusantium-quo-tenetur-harum(.+)~');
//$I->
//$I->seeCurrentUrlEquals('/aut-ex-accusantium-quo-tenetur-harum?#comment_submitted');

DB::rollBack();