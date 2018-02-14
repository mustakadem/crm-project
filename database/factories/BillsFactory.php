<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {

    $num1 = $faker->numberBetween($min = 4, $max = 250);
    $num2= $faker->numberBetween($min = 4, $max = 250);
    return [
        'price' => $num1>$num2? $num1 : $num2,
        'discount' => $num1>$num2? $num1 : $num2,
        'total' => $num1 > $num2 ? $num1 - $num2 : $num2 - $num1,
    ];
});
