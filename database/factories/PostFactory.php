<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->text,
        'comments_number' => $faker->numberBetween(0,20),
        'publish' => $faker->boolean,
    ];
});
