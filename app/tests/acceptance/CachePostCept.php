<?php
/**
 * Booo! Dirty
 * Have a better way to test the cache ?
 * https://github.com/SebSept/onemorelaravelblog
 */
$I = new WebGuy($scenario);
$I->wantTo('Cache works on Post view');

\Config::set('cache.driver', 'file');
////Cache::flush(); // does not always delete files
$cache_dir = Cache::driver()->getDirectory();
//dd($cache_dir);
`sudo rm -Rf $cache_dir/*`;
`sudo rm -Rf $cache_dir/../views/*`;

$app_path = app_path();
//
$output = $return_var = NULL;
//// the requested page in the following line will not execute in testing env but in default env
//// so that cache will be enable if enabled in config
//// it MUST be enabled en config
//// @todo check that cache is enabled
print 'be sure that cache is enabled to test '. __FILE__;// check using wget
exec( "$app_path/tests/test_cache.php", $output, $return_var );

Codeception\TestCase::assertEquals(0, $return_var, __FILE__);


// version codeception

//`sudo rm -Rf $cache_dir/*`;
//`sudo rm -Rf $cache_dir/../views/*`;
// request page one time (not cached)
//$I->amOnPage('/aut-ex-accusantium-quo-tenetur-harum');
//$I->see('Officiis perspiciatis error ut et officiis quia voluptatem voluptatem');
//
//// request page second time (cached)
////$I->amOnPage('/aut-ex-accusantium-quo-tenetur-harum');
//$I->amOnPage('/aut-ex-accusantium-quo-tenetur-harum');
//$I->see('Officiis perspiciatis error ut et officiis quia voluptatem voluptatem');
//


