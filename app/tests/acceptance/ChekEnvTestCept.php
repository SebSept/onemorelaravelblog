<?php
$I = new WebGuy($scenario);
$I->wantTo('check thats tests are running in testing environnement');
$I->amOnPage('/');
$I->see('My blog subtitle - testing env');