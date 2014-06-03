<?php
$I = new WebGuy($scenario);
$I->wantTo('Published post appears on home');
$I->amOnPage('/');
$I->see('Nobis sint qui aut nisi aut id eum quia molestiae.');
