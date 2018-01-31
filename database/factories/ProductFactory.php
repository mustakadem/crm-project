<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    $price= $faker-> buildingNumber . '$';
    return [
        'name' => $faker->firstName,
        'type_product' => 'servicio',
        'price' => $price,
        'image' =>'http://lorempixel.com/150/150/?random',
        'description' => $faker->realText(100),
    ];
});
