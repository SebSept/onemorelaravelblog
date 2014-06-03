<?php
$I = new WebGuy($scenario);
$I->wantTo('Tests are running in testing environnement');
$I->amOnPage('/');
$I->see('My blog subtitle - testing env');