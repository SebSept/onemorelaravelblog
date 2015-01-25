<?php
// Here you can initialize variables that will for your tests
use Laracasts\TestDummy\Factory;

// this ob_start() is needed to avoid 
// "ErrorException: ob_end_clean(): failed to delete buffer. No buffer to delete"
// triggered by ./vendor/phpunit/phpunit/PHPUnit/Framework/TestCase.php line 897 ( PHPUnit 3.7.37 )
ob_start();

$h = new \Codeception\Module\WebHelper();
$h->prepareEmptyCache();

Artisan::call('migrate');
Factory::$factoriesPath = 'app/tests/factories';