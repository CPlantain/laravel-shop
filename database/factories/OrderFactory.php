<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'status' => 0,
        'name' => $faker->name(),
        'phone' => $faker->e164PhoneNumber()
    ];
});
