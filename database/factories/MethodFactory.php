<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Method;
use Faker\Generator as Faker;

$factory->define(Method::class, function (Faker $faker) {
    return [
        'tag_id' => 1,
        'name' => $faker->name,
        'type' => collect(Method::$types)->random(),
        'description' => $faker->text(200),
        'return_type_id' => 1,
    ];
});
