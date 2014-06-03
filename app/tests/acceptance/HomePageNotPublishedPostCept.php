<?php
$I = new WebGuy($scenario);
$I->wantTo('Not published post does not appears on home');
$I->amOnPage('/');
$I->dontSee('Quo eos natus unde cum occaecati.');

