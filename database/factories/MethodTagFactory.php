<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MethodTag;
use Faker\Generator as Faker;

$factory->define(MethodTag::class, function (Faker $faker) {
    return [
        'tag' => $faker->userName,
        'description' => $faker->text(200),
    ];
});
