<?php
$I = new WebGuy($scenario);
$I->wantTo('Check that a published post appears on home');
$I->amOnPage('/');
$I->see('Nobis sint qui aut nisi aut id eum quia molestiae.');
