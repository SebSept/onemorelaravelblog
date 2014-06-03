<?php
$I = new WebGuy($scenario);
$I->wantTo('Published post can be viewed');
$I->amOnPage('aut-ex-accusantium-quo-tenetur-harum');
// post title
$I->see('In libero qui ut.'); 
// post content (piece)
$I->see('Officiis perspiciatis error ut et officiis quia voluptatem voluptatem');
