<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->text($maxNbChars = 100),
        'user_id' => User::all()->random()->id,
    ];
});
