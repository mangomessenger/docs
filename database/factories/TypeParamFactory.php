<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\TypeParam::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'description' => $faker->text(200),
        'type_id' => 1,
        'return_type_id' => 1,
    ];
});
