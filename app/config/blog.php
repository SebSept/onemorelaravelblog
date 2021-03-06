<?php

/**
 * Blog configuration
 * 
 * Note : your are not supposed to change the values here.
 * Instead use your own configuration file. 
 * @see http://laravel.com/docs/configuration#environment-configuration for detailled informations
 * @package onemorelaravelblog
 */

return [
    'title' => 'My blog name',
    'subtitle' => 'My blog subtitle',
    // Posts per page on home
    'posts_per_page' => 3,
    'comments_per_page_admin' => 25,
    'posts_per_page_admin' => 25,
    // locale for dates	
    // this is just for date, you also have to change 'locale' in app/configi/app.php
    'locale' => 'en_US',
    'dateformat' => '%B %d, %Y',
    // admin credentials
    'password' => '',
    'user' => '',
    // theme
    // changing theme name implies creating 
    // - /app/view/theme-name dir
    // - /public/theme-name dir
    'theme' => 'default',
    'tag_class' => 'btn btn-default',
];
