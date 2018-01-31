<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {

    $name= $faker->unique()->firstName;
    $surname=$faker->lastName;

    return [
        'name' => $name,
        'surnames' => $surname,
        'username'=> $name.'.'.$surname,
        'email' => $name.'.'.$surname.'@'.$faker->safeEmailDomain,
        'movil' => $faker->phoneNumber,
        'sector' => $faker->company,
        'avatar' => 'https://picsum.photos/150/150/?random',
        'website' => $faker->domainName,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
