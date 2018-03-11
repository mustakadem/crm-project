<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'type_product' => 'servicio',
        'price' => $faker->numberBetween($min = 4, $max = 250),
        'description' => $faker->realText(100),
    ];
});
