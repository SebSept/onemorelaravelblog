<?php
$I = new WebGuy($scenario);
$I->wantTo('Post with specified tag does not appears on tag page');
$I->amOnPage('tag/accusamus'); // tag->id = 2
$I->dontSee('Qui amet ipsum sunt.');
