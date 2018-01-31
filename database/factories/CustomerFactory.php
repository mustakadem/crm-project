<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {

    $name=$faker->firstName;
    $surnames=$faker->lastName;
    $email= $name.'.'.$surnames.'@'.$faker->safeEmailDomain;
    return [
        'name' => $name,
        'surnames' => $surnames,
        'type_customers'=> 'activo',
        'image' => 'https://picsum.photos/150/150/people',
        'address' => $faker->address,
        'number' => $faker->phoneNumber,
        'movil' => $faker->phoneNumber,
        'email' => $email,
        'company' => $faker->company,
        'job_title' => $faker->jobTitle,
        'notes'=>$faker->realText(30)
    ];
});
