<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Method;
use Faker\Generator as Faker;

$methods = [ '/sendMessage', '/deleteMessage', '/viewChat', '/viewMessage', '/getChats', '/reportSpam', '/banUser'];

$factory->define(Method::class, function (Faker $faker) use ($methods) {
    return [
        'tag_id' => 1,
        'name' => collect($methods)->random(),
        'type' => 'GET',
        'description' => $faker->text(200),
        'return_type_id' => 1,
    ];
});
