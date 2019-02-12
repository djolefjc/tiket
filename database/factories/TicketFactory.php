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

$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
        'sifra' => uniqid(),
        'napomena' => $faker->sentence(),
        'opis' => $faker->paragraph(),
        'user_id' => rand(1,30),
        'created_at' =>$faker->dateTime()
    ];
});
