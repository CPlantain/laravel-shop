<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
    	'category_id' => factory(App\Category::class),
        'name' => $faker->sentence(2),
        'slug' => $faker->slug(2),
        'description' => $faker->sentence(),
        'price' => $faker->randomNumber(4)
    ];
});
