<?php
$I = new WebGuy($scenario);
$I->wantTo('Unpublished comment can\'t be viewed');
$I->amOnPage('itaque-veritatis-eligendi-molestias-eaque'); // post 2

// comment 20 title
$I->dontSee('Sed ipsam deleniti ratione voluptate optio.'); 
// comment 20 content
$I->dontSee('Et puis ils mangèrent et trinquèrent, tout en sueur, mais sans prendre garde aux cahots, accrochant par-ci par- là, ne s\'en souciant, démoralisé, et presque commettre un sacrilège. Mais un.');


