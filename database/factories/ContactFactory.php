<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {

    $name=$faker->firstName;
    $surnames=$faker->lastName;
    $email= $name.'.'.$surnames.'@'.$faker->safeEmailDomain;
    return [
        'name' => $name,
        'surnames' => $surnames,
        'image' => 'https://picsum.photos/150/150/?random',
        'address' => $faker->address,
        'movil' => $faker->phoneNumber,
        'email' => $email,
        'notes'=>$faker->realText(100)
    ];
});
