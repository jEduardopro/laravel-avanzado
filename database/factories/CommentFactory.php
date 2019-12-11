<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text(),
        'post_id' => \App\Models\Post::all()->random()->id,
        'user_id' => \App\User::all()->random()->id,

    ];
});
