<?php
$I = new WebGuy($scenario);
$I->wantTo('Post with specified tag appears on tag page');
$I->amOnPage('tag/accusamus'); // tag->id = 2
$I->see('In libero qui ut.');
