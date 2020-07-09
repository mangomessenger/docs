<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


$types = [ 'string', 'object', 'bool', 'Message', 'User', 'Chat', 'Image', 'AuthResponse'];

$factory->define(\App\Type::class, function (Faker $faker) use ($types) {
    return [
        'name' => collect($types)->random(),
        'description' => $faker->text(200),
    ];
});
