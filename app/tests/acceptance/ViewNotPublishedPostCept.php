<?php
$I = new WebGuy($scenario);
$I->wantTo('See a not published post');
try{
    $I->amOnPage('/neque-aut-culpa-ex-sunt-incidunt-officiis-dolores');
//    $I->amOnPage('/');
    // exception is throw on previous line so the rest of this block is not supposed to be executed
    // if it is : be sure to fail in the next lines :
    $I->see('Page supposed not to be found but no NotFoundHttpException throw :/');
    $I->dontSee('Page supposed not to be found but no NotFoundHttpException throw :/');
}
catch(Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e )
{
    // nothing : test is ok
    
//     received 404 code
//    $I->seeResponseCodeIs(404);
////     don't see title
//    $I->dontSee('Quo eos natus unde cum occaecati.'); 
////     don't see contents
//    $I->dontSee('Deserunt consectetur aut voluptas sint. Excepturi expedita et rem ipsa.');
}


