<?php

$factory('SebSept\OMLB\Models\Post\Post', [
    'title' => $faker->words(3),
    'slug' => $faker->slug,
    'teaser' => $faker->words(5),
    'content' => $faker->text,
    'published' => 0,
    'updated_at' => '2015-01-01 15:26:00',
    'created_at' => '2015-02-01 15:26:00'
]);

$factory('SebSept\OMLB\Models\Comment\Comment', [
    'title' => $faker->words(3),
    'author_name' => $faker->name,
    'author_site' => $faker->url,
    'content' => $faker->sentences(3),
    'published' => 0,
    'updated_at' => '2015-01-01 15:26:00',
    'created_at' => '2015-02-01 15:26:00',
    'post_id' => 'factory:SebSept\OMLB\Models\Post\Post'
]);

$factory('SebSept\OMLB\Models\Tag\Tag', [
    'title' => $faker->word
]);