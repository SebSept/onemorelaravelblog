<?php
$I = new Guest($scenario);
$I->wantTo('Tests are running in testing environnement');
$I->amOnPage('/');
$I->see('My blog subtitle - testing env');