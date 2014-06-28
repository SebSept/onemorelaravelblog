<?php
$I = new WebGuy($scenario);
$I->wantTo('Published comment can be viewed');
$I->amOnPage('itaque-veritatis-eligendi-molestias-eaque'); // post 2

// comment 8 title
$I->see('Ratione harum voluptatem optio explicabo.'); 
// comment 8 content
$I->see('Au bas de leur jupon, et les papillons de nuit tournoyaient autour de lui faire remettre au presbytère dans la prairie, où elle vivait encore, il adopta ses prédilections, ses idées; il.');


