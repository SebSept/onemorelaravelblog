<?php
$I = new WebGuy($scenario);
$I->wantTo('Check that a published post appears on home');
$I->amOnPage('/');
$I->dontSee('Quo eos natus unde cum occaecati.');

