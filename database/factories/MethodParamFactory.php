<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\MethodParam::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'description' => $faker->text(200),
        'method_id' => 1,
        'return_type_id' => 1,
    ];
});
