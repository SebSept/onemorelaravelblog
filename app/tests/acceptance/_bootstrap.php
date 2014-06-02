<?php
// Here you can initialize variables that will for your tests
// this ob_start() is needed to avoid 
// "ErrorException: ob_end_clean(): failed to delete buffer. No buffer to delete"
// triggered by ./vendor/phpunit/phpunit/PHPUnit/Framework/TestCase.php line 897 ( PHPUnit 3.7.37 )
ob_start();
